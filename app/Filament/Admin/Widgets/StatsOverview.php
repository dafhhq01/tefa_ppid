<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', '124')
                ->description('7 berita baru minggu ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total Dokumen', '82')
                ->description('Pengaduan terbaru')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make('Permohonan Masuk', '11')
                ->description('2 sedang di tinjau')
                ->descriptionIcon('heroicon-m-clipboard-document-check')
                ->color('danger'),
            Stat::make('Aktivitas Admin', '30')
                ->description('13 aktivitas terbaru')
                ->descriptionIcon('heroicon-m-eye')
                ->color('warning    ')
        ];
    }
}
