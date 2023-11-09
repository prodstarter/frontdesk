<?php

namespace App\Filament\Admin\Widgets;

use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Flowframe\Trend\TrendValue;
use App\Actions\Trend as ActionsTrend;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class GeneralStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        $todayVisitsData = ActionsTrend::model(Visit::class)
            ->filterBy('today')
            ->count();

        $todayVisits = Visit::whereBetween('created_at', 
            [Carbon::now()->startOfDay(), Carbon::now()]
            )->count();

        $thisWeekVisitsData = ActionsTrend::model(Visit::class)
            ->filterBy('this_week')
            ->count();

        $thisWeekVisits = Visit::whereBetween('created_at', 
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->count();

        $thisMonthVisitsData = ActionsTrend::model(Visit::class)
            ->filterBy('this_month')
            ->count();

        $thisMonthVisits = Visit::whereBetween('created_at', 
            [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
            )->count();

        $allTimeVisitsData = ActionsTrend::model(Visit::class)
            ->filterBy('all_time')
            ->count();

        $allTimeVisits = Visit::count();

        $employee = Employee::count();
        $departament = Department::count();
        $designation = Designation::count();

        return [
                Stat::make('Today\'s Visits',  $todayVisits)
                    ->chart($todayVisitsData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                    ->color('success'),
                Stat::make('This Week\'s Visit',  $thisWeekVisits)
                    ->chart($thisWeekVisitsData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                    ->color('success'),
                Stat::make('This Month\'s Visit',  $thisMonthVisits)
                    ->chart($thisMonthVisitsData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                    ->color('success'),
                Stat::make('Total Visits',  $allTimeVisits)
                    ->chart($allTimeVisitsData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                    ->color('success'),
                Stat::make('Employees', $employee),
                Stat::make('Departaments', $departament),
                Stat::make('Designations', $designation),
        ];
    }
}
