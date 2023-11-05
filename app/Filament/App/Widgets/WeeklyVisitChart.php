<?php

namespace App\Filament\App\Widgets;

use Filament\Forms;
use App\Models\Visit;
use Flowframe\Trend\TrendValue;
use App\Actions\Trend as ActionsTrend;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class WeeklyVisitChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'weeklyVisitChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Weekly Visits';

     /**
     * Widget content height
     *
     * @var integer|null
     */
    protected static ?int $contentHeight = 260;

     /**
     * Filter Form
     *
     * @return array
     */
    protected function getFormSchema(): array
    {
        return [

            Forms\Components\Radio::make('weeklyVisitChartType')
                ->default('bar')
                ->options([
                    'line' => 'Line',
                    'bar' => 'Col',
                    'area' => 'Area'
                ])
                ->inline(true)
                ->label('Type'),

            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\Toggle::make('weeklyVisitChartMarkers')
                        ->default(false)
                        ->label('Markers'),

                    Forms\Components\Toggle::make('weeklyVisitChartGrid')
                        ->default(false)
                        ->label('Grid'),
                ]),

            Forms\Components\TextInput::make('weeklyVisitChartAnnotations')
                ->required()
                ->numeric()
                ->default(25)
                ->label('Annotations'),
        ];
    }

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $filters = $this->filterFormData;

        $data = ActionsTrend::model(Visit::class)
            ->filterBy('this_week')
            ->count();

        return [
            'chart' => [
                'type' => $filters['weeklyVisitChartType'],
                'height' => 250,
                'toolbar' => [
                    'show' => false
                ]
            ],
            'series' => [
                [
                    'name' => 'Visits per week',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 2,
                ],
            ],
            'xaxis' => [
                'categories' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit'
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit'
                    ],
                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'vertical',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#fbbf24'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'grid' => [
                'show' => $filters['weeklyVisitChartGrid']
            ],
            'markers' => [
                'size' => $filters['weeklyVisitChartMarkers'] ? 3 : 0
            ],
            'tooltip' => [
                'enabled' => true
            ],
            'stroke' => [
                'width' => $filters['weeklyVisitChartType'] === 'line' ? 4 : 0
            ],
            'colors' => ['#f59e0b'],
            'annotations' => [
                'yaxis' => [
                    [
                        'y' => $filters['weeklyVisitChartAnnotations'],
                        'borderColor' => '#ef4444',
                        'borderWidth' => 1,
                        'label' => [
                            'borderColor' => '#ef4444',
                            'style' => [
                                'color' => '#fffbeb',
                                'background' => '#ef4444',
                            ],
                            'text' => 'Annotation: ' . $filters['weeklyVisitChartAnnotations'],
                        ],
                    ],
                ],
            ],
        ];
    }
}
