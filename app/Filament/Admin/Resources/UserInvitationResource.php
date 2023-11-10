<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\UserInvitation;
use Filament\Resources\Resource;
use App\Mail\UserInvitationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\UserInvitationResource\Pages;
use App\Filament\Admin\Resources\UserInvitationResource\RelationManagers;

class UserInvitationResource extends Resource
{
    protected static ?string $model = UserInvitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->unique(UserInvitation::class, ignoreRecord: true)
                    ->required()
                    ->autofocus()
                    ->disableAutocomplete()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('resend')
                    ->label('Resend')
                    ->icon('heroicon-o-inbox-stack')
                    ->requiresConfirmation()
                    ->modalIcon('heroicon-o-inbox-stack')
                    ->modalHeading('Resend Invitation')
                    ->modalButton('Resend Now')
                    ->action(function (Model $record) {
                        Mail::to($record->email)->send(new UserInvitationMail($record));
                        Notification::make()
                            ->success()
                            ->title('Invitation sent')
                            ->body('Invitation has been successfully sent to the recipient.')
                            ->send();
                    }),
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
            'index' => Pages\ManageUserInvitations::route('/'),
        ];
    }    
}
