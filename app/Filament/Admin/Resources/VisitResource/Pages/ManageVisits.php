<?php

namespace App\Filament\Admin\Resources\VisitResource\Pages;

use App\Filament\Admin\Resources\VisitResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVisits extends ManageRecords
{
    protected static string $resource = VisitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
