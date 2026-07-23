<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('thumbnail'),
                Textarea::make('excerpt')
                    ->columnSpanFull(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('published_at'),
                TextInput::make('author_id')
                    ->numeric(),
                Toggle::make('is_featured')
                    ->required(),
            ]);
    }
}
