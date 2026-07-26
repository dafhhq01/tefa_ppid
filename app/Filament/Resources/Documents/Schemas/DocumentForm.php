<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->label('Judul Dokumen'),

                FileUpload::make('file')
                    ->directory('documents')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->label('File Dokumen')
                    ->getUploadedFileNameForStorageUsing(
                        fn($file): string => self::customFilename($file, 'doc')
                    ),

                Select::make('category')
                    ->required()
                    ->label('Kategori')
                    ->options([
                        'SOP' => 'SOP',
                        'Pelayanan' => 'Pelayanan',
                        'Informasi' => 'Informasi',
                        'Pengadaan' => 'Pengadaan',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->searchable(),

                Select::make('type')
                    ->options([
                        'public' => 'Public',
                        'procurement' => 'Procurement'
                    ])
                    ->required()
                    ->label('Jenis Penggunaan'),
            ]);
    }

    private static function customFilename($file, $prefix = 'doc'): string
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $date = now()->format('Y-m-d');
        $cleanName = Str::slug($originalName, '-');

        $baseName = "{$prefix}-{$cleanName}-{$date}";
        $fullName = "{$baseName}.{$extension}";

        $counter = 1;
        $disk = Storage::disk('public');
        while ($disk->exists("documents/{$fullName}")) {
            $fullName = "{$baseName}-" . $counter++ . ".{$extension}";
        }

        return $fullName;
    }
}
