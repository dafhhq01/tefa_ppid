<?php

namespace App\Filament\Resources\StatusHistories;

use App\Filament\Resources\StatusHistories\Pages;
use App\Models\StatusHistory;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class StatusHistoryResource extends Resource
{
    protected static ?string $model = StatusHistory::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Layanan PPID';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Riwayat Status Log';
    protected static ?int $navigationSort = 3;

    // MATIKAN tombol Create biar admin gak bisa bikin log palsu manual
    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('informationRequest.ticket_number')
                    ->label('No. Tiket Permohonan')
                    ->searchable()
                    ->sortable()
                    ->default('—'),
                
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'process' => 'info',
                        'completed' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('note')
                    ->label('Catatan Admin')
                    ->limit(50)
                    ->searchable(),
                
                TextColumn::make('changer.name')
                    ->label('Diubah Oleh')
                    ->default('Sistem Otomatis')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Waktu Perubahan')
                    ->dateTime('d M Y, H:i:s')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                \Filament\Actions\ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStatusHistories::route('/'),
        ];
    }
}