<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TestChartWigetA extends ChartWidget
{
    protected ?string $heading = 'Test Chart Wiget A';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'My First Dataset',
                    'data' => [11, 16, 7, 3, 14],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ]    
                ],
            ],
            'labels' => ['Red','Green','Yellow','Grey','Blue'],
        
        ];
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}
