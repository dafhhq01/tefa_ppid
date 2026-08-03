<?php

namespace App\Filament\Admin\Widgets;

use App\Models\ActivityLog;
use App\Models\Banner;
use App\Models\Setting;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1; // tampil duluan (atas)
    protected function getStats(): array
    {
        return [
            Stat::make('Total Banner', Banner::count())
                ->description('Banner aktif: ' . Banner::where('is_active', true)->count())
                ->descriptionIcon('heroicon-m-photo')
                ->color('success'),

            Stat::make('Total Setting', Setting::count())
                ->description('Konfigurasi tersimpan')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('info'),

            Stat::make('Total User', User::count())
                ->description('User terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make('Aktivitas Hari Ini', ActivityLog::whereDate('created_at', today())->count())
                ->description('Total aksi tercatat hari ini')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('warning'),
        ];
    }
}
