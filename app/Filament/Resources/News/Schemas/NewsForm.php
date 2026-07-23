<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(string $operation, ?string $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state ?? '')) : null),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->label('Author')
                    ->required(),

                FileUpload::make('thumbnail')
                    ->directory('news')
                    ->image()
                    ->label('Thumbnail'),

                Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->maxLength(255),

                RichEditor::make('content')
                    ->label('Isi Berita')
                    ->required()
                    ->columnSpanFull(),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publish'),

                Toggle::make('is_featured')
                    ->label('Featured di Homepage'),
            ]);
    }
}
