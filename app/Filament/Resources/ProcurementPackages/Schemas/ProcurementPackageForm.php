<?php

namespace App\Filament\Resources\ProcurementPackages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProcurementPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->label('Nama Paket'),

                TextInput::make('year')
                    ->required()
                    ->label('Tahun')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(now()->year + 5),

                Select::make('stage')
                    ->options([
                        'perencanaan' => 'Perencanaan',
                        'pemilihan' => 'Pemilihan',
                        'pelaksanaan' => 'Pelaksanaan'
                    ])
                    ->label('Tahapan')
                    ->placeholder('Pilih tahapan (opsional untuk RUP)'),

                FileUpload::make('file')
                    ->directory('procurement')
                    ->label('Dokumen Pengadaan')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(5120)
                    ->getUploadedFileNameForStorageUsing(
                        fn($file): string => self::customFilename($file, 'procurement')
                    ),

                TextInput::make('external_url')
                    ->label('Link Eksternal')
                    ->url()
                    ->placeholder('https://example.com/dokumen'),

                Select::make('parent_id')
                    ->label('RUP / Paket Induk')
                    ->relationship('parent', 'title')
                    ->placeholder('Pilih RUP (kosongkan jika ini RUP)')
                    ->searchable()
                    ->preload(),
            ]);
    }

    private static function customFilename($file, $prefix = 'procurement'): string
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $date = now()->format('Y-m-d');
        $cleanName = Str::slug($originalName, '-');

        $baseName = "{$prefix}-{$cleanName}-{$date}";
        $fullName = "{$baseName}.{$extension}";

        $counter = 1;
        $disk = Storage::disk('public');
        while ($disk->exists("procurement/{$fullName}")) {
            $fullName = "{$baseName}-" . $counter++ . ".{$extension}";
        }

        return $fullName;
    }
}
