<?php

namespace App\Filament\Admin\Resources;

use App\Models\{
    Department,
};
use Filament\{
    Forms,
    Tables,
    Forms\Form,
    Tables\Table,
    Resources\Resource,
};
use Illuminate\Database\Eloquent\{
    Builder,
    SoftDeletingScope,
};
use App\Rules\NumericallyDifferent;
use App\Filament\Admin\Resources\DepartmentResource\Pages;
use App\Filament\Admin\Resources\DepartmentResource\RelationManagers;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $slug = 'manage/departments';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Department Name')
                    ->placeholder('Department Name')
                    ->required(),
                Forms\Components\Select::make('parent_id')
                    ->label('Parent Department')
                    ->placeholder('Parent Department')
                    ->relationship('parent_department', fn () => "name")
                    ->rules([
                        new NumericallyDifferent(['data.id'], __('Parent Department cannot be same as the Department')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Department Name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created at')
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
            'index' => Pages\ManageDepartments::route('/'),
        ];
    }    
}
