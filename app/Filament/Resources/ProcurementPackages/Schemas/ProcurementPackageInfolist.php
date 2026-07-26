<?php

namespace App\Filament\Resources\ProcurementPackages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProcurementPackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('year'),
                TextEntry::make('stage')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('file')
                    ->placeholder('-'),
                TextEntry::make('external_url')
                    ->placeholder('-'),
                TextEntry::make('parent_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
