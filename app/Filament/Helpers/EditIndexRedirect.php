<?php

namespace App\Filament\Helpers;

use Filament\Resources\Pages\EditRecord;

class EditIndexRedirect extends EditRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
