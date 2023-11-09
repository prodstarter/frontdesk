<?php

namespace App\Filament\App\Pages;

use App\Filament\App\Widgets\TodayVisits;
use App\Filament\App\Widgets\WeeklyVisitChart;
use App\Filament\App\Widgets\GeneralStatsOverview;
use Filament\Pages\Dashboard as FilamentDashboard;

class Dashboard extends FilamentDashboard
{
    public function getColumns(): int | array
    {
        return 2;
    }

    public function getWidgets(): array
    {
        return [
            GeneralStatsOverview::class,
            TodayVisits::class,
            WeeklyVisitChart::class,
        ];
    }

}
