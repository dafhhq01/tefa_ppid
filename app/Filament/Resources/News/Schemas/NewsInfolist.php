<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry; // Tambahan import
use Filament\Schemas\Schema;

class NewsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Judul Berita')
                    ->weight('bold')
                    ->size('lg'),
                TextEntry::make('slug')
                    ->color('gray'),
                ImageEntry::make('thumbnail') // Render sebagai gambar
                    ->label('Thumbnail')
                    ->placeholder('Tidak ada thumbnail'),
                TextEntry::make('author.name') // Tampilkan nama author
                    ->label('Author'),
                TextEntry::make('excerpt')
                    ->label('Ringkasan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('content')
                    ->label('Isi Berita')
                    ->html() // Render tag HTML dari Rich Editor
                    ->columnSpanFull(),
                TextEntry::make('published_at')
                    ->label('Tanggal Publish')
                    ->dateTime()
                    ->placeholder('-'),
                IconEntry::make('is_featured')
                    ->label('Featured di Homepage')
                    ->boolean(),
            ]);
    }
}
