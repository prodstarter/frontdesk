<?php

namespace App\Filament\Company\Resources;

use App\Filament\Company\Resources\VisitorHistoryResource\Pages;
use App\Filament\Company\Resources\VisitorHistoryResource\RelationManagers;
use App\Models\Visit;
use App\Models\VisitorHistory;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorHistoryResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Visitor\'s Histories';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('company.name')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('employee.name')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('visitor')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('visitor_phone'),
                \Filament\Tables\Columns\TextColumn::make('visitor_email'),
                \Filament\Tables\Columns\TextColumn::make('purpose')
                    ->wrap()
                    ->limit(50),
                \Filament\Tables\Columns\TextColumn::make('arrival')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('departure')
                    ->sortable(),
            ])
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitorHistories::route('/'),
            'create' => Pages\CreateVisitorHistory::route('/create'),
            'edit' => Pages\EditVisitorHistory::route('/{record}/edit'),
        ];
    }
}
