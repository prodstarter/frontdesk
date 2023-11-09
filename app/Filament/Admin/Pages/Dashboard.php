<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as FilamentDashboard;
use App\Filament\Admin\Widgets\GeneralStatsOverview;

class Dashboard extends FilamentDashboard
{
    protected static bool $shouldRegisterNavigation = true;

    public function getColumns(): int | array
    {
        return 2;
    }

    public function getWidgets(): array
    {
        return [
            GeneralStatsOverview::class
        ];
    }

}