<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use PhpParser\Node\Stmt\Label;

class PpidChart extends ChartWidget
{
    protected ?string $heading = 'Statistik Layanan PPID (2026)';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        return [
            'dataset' => [
                [
                    'Label' => 'Jumlah Layanan',
                    'data' =>  ['10,20,35,42'],
                    'fill' => 'start',
                    'bordercolor' => '#3b82f6', 
                ],

            ],
            'labels' => ['Januari', 'February', 'Maret'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
