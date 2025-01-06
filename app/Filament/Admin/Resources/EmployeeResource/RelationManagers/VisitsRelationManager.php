<?php

namespace App\Filament\Admin\Resources\EmployeeResource\RelationManagers;

use Carbon\{
    Carbon,
};

use Filament\{
    Forms,
    Tables,
    Forms\Form,
    Tables\Table,
    Infolists\Infolist,
    Tables\Actions\Action,
    Tables\Actions\CreateAction,
    Infolists\Components\IconEntry,
    Infolists\Components\TextEntry,
};

use Illuminate\{
    Database\Eloquent\Model,
    Database\Eloquent\Builder,
    Database\Eloquent\SoftDeletingScope,
};
use Filament\Resources\RelationManagers\RelationManager;

class VisitsRelationManager extends RelationManager
{
    protected static string $relationship = 'visits';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('visitor')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('visitor')
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('visitor'),
                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->state(function (Model $record) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $record->arrival)->format('Y-m-d');
                    }),
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
            ]);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('visitor_email')
                    ->label('Email'),
                TextEntry::make('visitor_phone')
                    ->label('Phone Number'),
                TextEntry::make('purpose')
                    ->label('Purpose for Visit'),
                TextEntry::make('created_at')
                    ->dateTime(),
            ])
            ->columns(1)
            ->inlineLabel();
    }
}
