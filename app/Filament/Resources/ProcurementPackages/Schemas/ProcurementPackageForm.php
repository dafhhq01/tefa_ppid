<?php

namespace App\Filament\Resources\ProcurementPackages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProcurementPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('year')
                    ->required(),
                Select::make('stage')
                    ->options(['perencanaan' => 'Perencanaan', 'pemilihan' => 'Pemilihan', 'pelaksanaan' => 'Pelaksanaan']),
                TextInput::make('file'),
                TextInput::make('external_url')
                    ->url(),
                TextInput::make('parent_id')
                    ->numeric(),
            ]);
    }
}
