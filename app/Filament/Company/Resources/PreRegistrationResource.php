<?php

namespace App\Filament\Company\Resources;

use App\Filament\Company\Resources\PreRegistrationResource\Pages;
use App\Filament\Company\Resources\PreRegistrationResource\RelationManagers;
use App\Models\PreRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Route;

class PreRegistrationResource extends Resource
{
    protected static ?string $model = PreRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        $companyId = Route::current()->parameter('tenant');
        return  parent::getEloquentQuery()->where('company_id', $companyId);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Group::make([
                    \Filament\Infolists\Components\TextEntry::make('first_name'),
                    \Filament\Infolists\Components\TextEntry::make('last_name'),
                    \Filament\Infolists\Components\TextEntry::make('gender'),
                ])
                    ->label('Personal Information')
                    ->columnSpan(2)
                    ->extraAttributes(['class' => 'border p-4 rounded-lg bg-gray-100 dark:bg-gray-800 dark:border-gray-600']),

                \Filament\Infolists\Components\Group::make([
                    \Filament\Infolists\Components\TextEntry::make('company.name')
                        ->label('Company'),
                    \Filament\Infolists\Components\TextEntry::make('category'),
                ])
                    ->label('Company Info')
                    ->extraAttributes(['class' => 'border p-4 rounded-lg bg-gray-100 dark:bg-gray-800 dark:border-gray-600']),

                \Filament\Infolists\Components\Group::make([
                    \Filament\Infolists\Components\TextEntry::make('email'),
                    \Filament\Infolists\Components\TextEntry::make('phone_number'),
                ])
                    ->label('Contact Information')
                    ->extraAttributes(['class' => 'border p-4 rounded-lg bg-gray-100 dark:bg-gray-800 dark:border-gray-600']),

                \Filament\Infolists\Components\Group::make([
                    \Filament\Infolists\Components\TextEntry::make('visit_date')
                        ->date(),
                    \Filament\Infolists\Components\TextEntry::make('entry_time')
                        ->time(),
                    \Filament\Infolists\Components\TextEntry::make('exit_time')
                        ->time(),
                ])
                    ->label('Visit Details')
                    ->extraAttributes(['class' => 'border p-4 rounded-lg bg-gray-100 dark:bg-gray-800 dark:border-gray-600']),


            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')->label('Company'),
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('visit_date')->date(),
                Tables\Columns\TextColumn::make('entry_time')->time(),
                Tables\Columns\TextColumn::make('exit_time')->time(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
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
            'index' => Pages\ListPreRegistrations::route('/'),
            'view' => Pages\ViewPreRegistration::route('/{record}/view'),
            // 'create' => Pages\CreatePreRegistration::route('/create'),
            'edit' => Pages\EditPreRegistration::route('/{record}/edit'),
        ];
    }
}
