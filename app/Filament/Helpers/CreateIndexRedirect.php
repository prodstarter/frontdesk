<?php

namespace App\Filament\Helpers;

use Filament\Resources\Pages\CreateRecord;

class CreateIndexRedirect extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
