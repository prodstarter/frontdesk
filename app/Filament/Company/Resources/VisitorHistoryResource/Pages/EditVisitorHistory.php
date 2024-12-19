<?php

namespace App\Filament\Company\Resources\VisitorHistoryResource\Pages;

use App\Filament\Company\Resources\VisitorHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisitorHistory extends EditRecord
{
    protected static string $resource = VisitorHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
