<?php

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->label('Judul Publikasi'),

                FileUpload::make('file')
                    ->label('Upload PDF')
                    ->directory('publications')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required()
                    ->getUploadedFileNameForStorageUsing(
                        fn($file): string => self::customFilename($file, 'publication')
                    ),

                Select::make('category')
                    ->options([
                        'laporan' => 'Laporan',
                        'publikasi_lainnya' => 'Publikasi Lainnya'
                    ])
                    ->required()
                    ->label('Kategori'),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi'),
            ]);
    }

    private static function customFilename($file, $prefix = 'publication'): string
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $date = now()->format('Y-m-d');
        $cleanName = Str::slug($originalName, '-');

        $baseName = "{$prefix}-{$cleanName}-{$date}";
        $fullName = "{$baseName}.{$extension}";

        $counter = 1;
        $disk = Storage::disk('public');
        while ($disk->exists("publications/{$fullName}")) {
            $fullName = "{$baseName}-" . $counter++ . ".{$extension}";
        }

        return $fullName;
    }
}
