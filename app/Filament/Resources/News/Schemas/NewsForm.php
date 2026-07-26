<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
                    ->unique(ignoreRecord: true)
                    ->label('Slug URL'),

                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->label('Author')
                    ->required()
                    ->searchable()
                    ->preload(),

                FileUpload::make('thumbnail')
                    ->directory('news')
                    ->image()
                    ->label('Thumbnail')
                    ->imagePreviewHeight('200')
                    ->imageCropAspectRatio('16:9')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                    ->helperText('Gambar akan otomatis dipotong (crop) menyesuaikan rasio 16:9 agar tampilan rapi di Homepage.')
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        $extension = $file->getClientOriginalExtension();
                        return \Illuminate\Support\Str::random(40) . '.' . $extension;
                    }),

                Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->maxLength(255)
                    ->rows(3)
                    ->columnSpanFull()
                    ->helperText('Ringkasan singkat berita (maksimal 255 karakter)'),

                RichEditor::make('content')
                    ->label('Isi Berita')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'blockquote',
                        'bulletList',
                        'orderedList',
                        'h2',
                        'h3',
                        'link',
                        'table',
                        'codeBlock',
                    ]),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publish')
                    ->default(now()),

                Toggle::make('is_featured')
                    ->label('Featured di Homepage')
                    ->helperText('Jika diaktifkan, berita ini akan tampil di homepage')
                    ->default(false),
            ]);
    }
}
