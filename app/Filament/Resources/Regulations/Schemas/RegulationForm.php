<?php

namespace App\Filament\Resources\Regulations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Http\UploadedFile;

class RegulationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options(['page' => 'Page', 'link' => 'Link'])
                    ->required()
                    ->live(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('content')
                    ->required(fn ($get) => $get('type') === 'page')
                    ->visible(fn ($get) => $get('type') === 'page')
                    ->columnSpanFull(),
                FileUpload::make('file')
                    ->disk('public')
                    ->directory('information')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->getUploadedFileNameForStorageUsing(
                        fn (UploadedFile $file): string => time().'_'.$file->getClientOriginalName()
                    ),
                TextInput::make('external_url')
                    ->required(fn ($get) => $get('type') === 'link')
                    ->visible(fn ($get) => $get('type') === 'link')
                    ->url(),
                TextInput::make('order')
                    ->required()
                    ->numeric(),
            ]);
    }
}
