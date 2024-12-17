<?php

namespace App\Filament\Company\Resources\PreRegistrationResource\Pages;

use App\Filament\Company\Resources\PreRegistrationResource;
use App\Filament\Helpers\CreateIndexRedirect;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePreRegistration extends CreateIndexRedirect
{
    protected static string $resource = PreRegistrationResource::class;
}
