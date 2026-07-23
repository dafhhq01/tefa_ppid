<?php

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('file')
                    ->label('Upload PDF')
                    ->directory('publications')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                Select::make('category')
                    ->options(['laporan' => 'Laporan', 'publikasi_lainnya' => 'Publikasi lainnya'])
                    ->required(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
