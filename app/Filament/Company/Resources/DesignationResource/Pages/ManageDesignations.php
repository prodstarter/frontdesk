<?php

namespace App\Filament\Company\Resources\DesignationResource\Pages;

use App\Filament\Company\Resources\DesignationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDesignations extends ManageRecords
{
    protected static string $resource = DesignationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
