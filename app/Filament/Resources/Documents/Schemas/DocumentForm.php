<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('file')
                    ->directory('documents')
                    ->required(),
                TextInput::make('category')
                    ->required(),
                Select::make('type')
                    ->options(['public' => 'Public', 'procurement' => 'Procurement'])
                    ->required(),
            ]);
    }
}
