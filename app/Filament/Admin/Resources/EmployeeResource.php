<?php

namespace App\Filament\Admin\Resources;

use Closure;

use App\Models\{
    Employee,
    Designation,
};

use Filament\{
    Forms,
    Tables,
    Forms\Form,
    Tables\Table,
    Resources\Resource,
};

use Illuminate\{
    Support\Collection,
    Database\Eloquent\Model,
    Database\Eloquent\Builder,
    Database\Eloquent\SoftDeletingScope,
};

use App\Rules\NumericallyDifferent;
use App\Filament\Admin\Resources\EmployeeResource\Pages;
use App\Filament\Admin\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $slug = 'manage/employees';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label(__('Email'))
                            ->placeholder(__('Email Address'))
                            ->required(),
                        Forms\Components\TextInput::make('first_name')
                            ->label(__('First Name'))
                            ->placeholder(__('First Name'))
                            ->required(),
                        Forms\Components\TextInput::make('last_name')
                            ->label(__('Last Name'))
                            ->placeholder(__('Last Name'))
                            ->required(),
                        Forms\Components\Select::make('department_id')
                            ->relationship('department', fn () => "name")
                            ->label(__('Department'))
                            ->placeholder(__('Department'))
                            ->preload()
                            ->searchable()
                            ->live()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label(strval(__('Department Name')))
                                    ->placeholder(strval(__('Department Name')))
                                    ->required(),
                                Forms\Components\Select::make('parent_id')
                                    ->label(strval(__('Parent Department')))
                                    ->placeholder(strval(__('Parent Department')))
                                    ->relationship('parent_department', fn () => "name")
                                    ->rules([
                                        new NumericallyDifferent(['data.id'], __('Parent Department cannot be same as the Department')),
                                    ]),
                            ])
                            ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                                return $action
                                    ->modalHeading('New Department')
                                    ->modalButton('New department')
                                    ->modalWidth('lg');
                            }),
                        Forms\Components\Select::make('designation_id')
                            ->label(__('Designation'))
                            ->relationship('designation', fn () => "name")
                            ->options(fn (Forms\Get $get): Collection => Designation::query()
                                ->where('department_id', $get('department_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label(strval(__('Designation Name')))
                                    ->placeholder(strval(__('Designation Name')))
                                    ->required(),
                                Forms\Components\Select::make('department_id')
                                    ->label(strval(__('Department')))
                                    ->placeholder(strval(__('Department')))
                                    ->relationship('department', fn () => "name"),
                            ])
                            ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                                return $action
                                    ->modalHeading('New Designation')
                                    ->modalButton('New Designation')
                                    ->modalWidth('lg');
                            }),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label(__('First Name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label(__('Last Name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->label(__('Department Name')),
                Tables\Columns\TextColumn::make('designation.name')
                    ->label(__('Designation Name')),
                Tables\Columns\TextColumn::make('visits')
                    ->label(__('No of Visits'))
                    ->state(function (Model $record) {
                        return $record->visits->count();
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\VisitsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
