<?php

namespace App\Filament\Company\Resources;

use App\Models\{
    Designation,
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
use App\Filament\Admin\Resources\DesignationResource\Pages;
use App\Filament\Admin\Resources\DesignationResource\RelationManagers;

class DesignationResource extends Resource
{
    protected static ?string $model = Designation::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $slug = 'manage/designations';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('company_id')
                    ->default(auth()->user()->currentCompany->id),
                Forms\Components\TextInput::make('name')
                    ->label('Designation Name')
                    ->placeholder('Designation Name')
                    ->required(),
                Forms\Components\Select::make('department_id')
                    ->label('Department')
                    ->placeholder('Department')
                    ->relationship('department', fn () => "name"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Designation Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->label('Department Name')
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
            'index' => Pages\ManageDesignations::route('/'),
        ];
    }    
}
