<?php

namespace App\Filament\Company\Resources\PreRegistrationResource\Pages;

use App\Filament\Company\Resources\PreRegistrationResource;
use App\Filament\Helpers\EditIndexRedirect;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPreRegistration extends EditIndexRedirect
{
    protected static string $resource = PreRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
