<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Visit;
use Flowframe\Trend\TrendValue;
use App\Actions\Trend as ActionsTrend;
use Filament\Widgets\BarChartWidget;

class VisitsChart extends BarChartWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Visits';

    public ?string $filter = 'this_month';

    public bool $readyToLoad = false;

    public function loadData()
    {
        $this->readyToLoad = true;
    }

    protected function getData(): array
    {
        if (!$this->readyToLoad) {
            $this->getSkeletonLoad();
        }

        $activeFilter = $this->filter;

        $data = ActionsTrend::model(Visit::class)
            ->filterBy($activeFilter)
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Visits',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgb(134, 217, 232)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'lineTension' => 0.1,
                    'borderWidth' => 1,
                    'hoverOffset'=> 4
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    public function getSkeletonLoad()
    {
        return [
            'datasets' => [
                [
                    'label' => 'Visits Loading',
                    'data' => [],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => [],
        ];
    }

    protected function getFilters(): ?array
    {
        return ActionsTrend::filterType();
    }
}
