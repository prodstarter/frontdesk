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
                    'backgroundColor' => $this->generateRandomColors(12),
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

    protected function generateRandomColors($n)
    {
        $colors = [
            0 => "rgb(228, 163, 244)",
            1 => "rgb(218, 141, 197)",
            2 => "rgb(178, 238, 174)",
            3 => "rgb(191, 134, 229)",
            4 => "rgb(129, 134, 165)",
            5 => "rgb(154, 157, 162)",
            6 => "rgb(251, 214, 175)",
            7 => "rgb(219, 249, 209)",
            8 => "rgb(134, 217, 232)",
            9 => "rgb(168, 177, 206)",
            10 => "rgb(240, 140, 170)",
            11 => "rgb(240, 170, 204)",
        ];

        return array_slice($colors, 0, $n);
    }
}
