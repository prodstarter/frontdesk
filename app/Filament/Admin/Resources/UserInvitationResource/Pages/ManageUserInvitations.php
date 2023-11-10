<?php

namespace App\Filament\Admin\Resources\UserInvitationResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Models\UserInvitation;
use App\Mail\UserInvitationMail;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Admin\Resources\UserInvitationResource;

class ManageUserInvitations extends ManageRecords
{
    protected static string $resource = UserInvitationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->createAnother(false)
                ->mutateFormDataUsing(function (array $data): array {
                    $data['code'] = substr(md5(rand(0, 9) . $data['email'] . time()), 0, 32);;
                    return $data;
                })
                ->before(function (Actions\CreateAction $action, array $data) {
                    $user = User::where('email', $data['email'])->first();
                    if ($user) {
                        Notification::make()
                            ->danger()
                            ->title('User already exist')
                            ->body('This email has already been used for a user on the platform')
                            ->persistent()
                            ->send();
                    
                        $action->halt();
                    }
                })
                ->after(function (UserInvitation $record) {
                    Mail::to($record->email)->send(new UserInvitationMail($record));
                })
                ->successNotification(
                    Notification::make()
                         ->success()
                         ->title('Invitation Sent')
                         ->body('An email invitation has been successfully sent to the user'),
                 )
                 ->modalWidth('md'),
        ];
    }
}
