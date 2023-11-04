<?php

namespace App\Filament\Admin\Resources;

use App\Models\{Visit};
use Filament\{
    Forms,
    Tables,
    Forms\Form,
    Tables\Table,
    Resources\Resource,
};
use App\Filament\Admin\Resources\VisitResource\Pages;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $slug = 'manage/visits';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Guest Book';

    public static function form(Form $form): Form
    {
        return $form
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
                    ->relationship('employee', fn () => 'first_name'),
                Forms\Components\Textarea::make('purpose')
                    ->label('Purpose')
                    ->placeholder('Purpose'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visitor')
                    ->label(__('Visitor'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.full_name')
                    ->label(__('Host'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('arrival')
                    ->label('Arrival')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('departure')
                    ->label('Departure')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageVisits::route('/'),
        ];
    }
}
