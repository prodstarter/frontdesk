<?php

namespace App\Filament\Company\Pages;

use App\Filament\App\Widgets\WeeklyVisitChart;
use App\Filament\Company\Widgets\GeneralStatsOverview;
use App\Filament\Company\Widgets\TodayVisits;
use App\Filament\Company\Widgets\VisitsChart;
use Filament\Pages\Dashboard as FilamentDashboard;

class CompanyDashboard extends FilamentDashboard
{
    protected static bool $shouldRegisterNavigation = true;

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
            VisitsChart::class,
        ];
    }
}
