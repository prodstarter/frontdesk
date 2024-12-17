<?php

namespace App\Filament\Company\Resources\PreRegistrationResource\Pages;

use App\Filament\Company\Resources\PreRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPreRegistrations extends ListRecords
{
    protected static string $resource = PreRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->Label('New Visitor'),
        ];
    }
}
