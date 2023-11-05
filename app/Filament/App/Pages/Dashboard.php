<?php

namespace App\Filament\App\Pages;

use App\Filament\App\Widgets\TodayVisits;
use App\Filament\App\Widgets\WeeklyVisitChart;
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
            TodayVisits::class,
            WeeklyVisitChart::class,
        ];
    }

}
