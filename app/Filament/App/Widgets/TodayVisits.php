<?php

namespace App\Filament\App\Widgets;

use Carbon\Carbon;
use App\Models\{
    Visit
};
use Filament\{
    Forms,
    Tables,
    Tables\Table,
    Tables\Actions\Action,
    Tables\Actions\CreateAction,
};
use Illuminate\Database\Eloquent\{
    Model,
    Builder,
};
use Filament\Notifications\Notification;
use Filament\Widgets\TableWidget as BaseWidget;

class TodayVisits extends BaseWidget
{

    public function table(Table $table): Table
    {
        return $table
        ->query(Visit::query()->whereDate('created_at', Carbon::today()))
        ->defaultSort('created_at', 'desc')
        ->columns([
            Tables\Columns\TextColumn::make('visitor')
                ->label(__('Visitor')),
            Tables\Columns\TextColumn::make('employee.full_name')
                ->label(__('Host'))
                ->description(fn (Visit $record): string => $record->employee->designation->name),
            Tables\Columns\TextColumn::make('arrival')
                ->label('Arrival')
                ->formatStateUsing(function (Model $record) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $record->arrival)->format('H:i:sa');
                }),
            Tables\Columns\TextColumn::make('departure')
                ->label('Departure')
                ->formatStateUsing(function (Model $record) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $record->departure)->format('H:i:sa');
                }),
        ])
        ->paginated(false)
        ->actions([
            Action::make('markDepart')
                ->requiresConfirmation()
                ->action(function (Visit $record) {
                    $record->departure = now();
                    $record->save();
                })
                ->hidden(fn (Visit $record): bool => $record->departure !== null),
        ])
        ->headerActions([
            CreateAction::make()
                ->form([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('visitor')
                            ->label('Visitor')
                            ->placeholder('Visitor')
                            ->required(),
                        Forms\Components\TextInput::make('visitor_phone')
                            ->label('Visitor Phone')
                            ->placeholder('Visitor Phone'),
                        Forms\Components\TextInput::make('visitor_email')
                            ->label('Visitor Email')
                            ->placeholder('Visitor Email'),
                        Forms\Components\Select::make('employee_id')
                            ->label('Host')
                            ->placeholder('Select Host')
                            ->relationship(
                                name: 'employee',
                                modifyQueryUsing: fn (Builder $query) => $query->orderBy('first_name')->orderBy('last_name'),
                            )
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->first_name} {$record->last_name} - {$record->designation->name}")
                            ->searchable(['first_name', 'last_name'])
                            ->preload()
                            ->loadingMessage('Loading employees...'),
                        Forms\Components\Textarea::make('purpose')
                            ->label('Purpose')
                            ->placeholder('Purpose')
                        ])
                    ])
                ->mutateFormDataUsing(function (array $data): array {
                    $data['arrival'] = now();
                    return $data;
                })
                ->successNotification(
                    Notification::make()
                         ->success()
                         ->title('Visitor Registered')
                         ->body('You have successfully created a new visitor'),
                 ),
        ]);
    }
}
