<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) =>
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('type')
                    ->required()
                    ->options([
                        'profil_ppid'    => 'Profil PPID',
                        'profil_sekolah' => 'Profil Sekolah',
                        'visi_misi'      => 'Visi Misi',
                        'tugas_fungsi'   => 'Tugas Fungsi',
                    ]),

                Textarea::make('subtitle')
                    ->columnSpanFull(),

                FileUpload::make('banner_image')
                    ->disk('public')
                    ->directory('pages')
                    ->image()
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->default(true)
                    ->required(),

                TextInput::make('meta_title')
                    ->maxLength(255),

                Textarea::make('meta_description')
                    ->columnSpanFull(),
            ]);
    }
}