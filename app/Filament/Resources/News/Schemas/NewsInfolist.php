<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
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

                // PERBAIKAN: ImageEntry dengan URL yang benar
                ImageEntry::make('thumbnail')
                    ->label('Thumbnail')
                    ->getStateUsing(function ($record) {
                        if (!$record->thumbnail) {
                            return null;
                        }
                        // Gunakan url() helper, bukan asset()
                        return url('storage/' . $record->thumbnail);
                    })
                    ->height(200)
                    ->width(300)
                    ->placeholder('Tidak ada thumbnail')
                    ->columnSpanFull(),

                TextEntry::make('author.name')
                    ->label('Author'),

                TextEntry::make('excerpt')
                    ->label('Ringkasan')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('content')
                    ->label('Isi Berita')
                    ->html()
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
