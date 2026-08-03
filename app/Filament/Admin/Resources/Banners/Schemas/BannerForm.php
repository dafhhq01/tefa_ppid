<?php

namespace App\Filament\Admin\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('subtitle')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('button_text')
                    ->required(),
                TextInput::make('button_link')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
