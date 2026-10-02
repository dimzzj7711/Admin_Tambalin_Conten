<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TestCharWigetC extends ChartWidget
{
    protected ?string $heading = 'Test Char Wiget C';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => ['Red','Blue','Yellow'],
                    'data' => [300, 50, 100],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ]    
                ],
            ],
            'labels' => ['Red','Blue', 'Yellow'],
            
            
        ];
        
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
