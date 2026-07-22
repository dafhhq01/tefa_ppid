<?php

namespace App\Filament\Resources\Information\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Http\UploadedFile;

class InformationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'slug')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('content')
                    ->columnSpanFull(),
                FileUpload::make('file')
                    ->disk('public')
                    ->directory('information')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->visible(fn ($get) => !$get('is_external_link'))
                    ->required(fn ($get) => !$get('is_external_link'))
                    ->getUploadedFileNameForStorageUsing(
                        fn (UploadedFile $file): string => time().'_'.$file->getClientOriginalName()
                    ),
                Toggle::make('is_external_link')
                    ->live()
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('external_url')
                    ->url()
                    ->visible(fn ($get) => $get('is_external_link'))
                    ->required(fn ($get) => $get('is_external_link'))
                    ->columnSpanFull(),
                TextInput::make('button_label')
                    ->required()
                    ->default('Read More')
                    ->columnSpanFull(),
            ]);
    }
}
