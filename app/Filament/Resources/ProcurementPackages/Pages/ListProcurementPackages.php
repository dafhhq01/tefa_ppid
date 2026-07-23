<?php

namespace App\Filament\Resources\ProcurementPackages\Pages;

use App\Filament\Resources\ProcurementPackages\ProcurementPackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProcurementPackages extends ListRecords
{
    protected static string $resource = ProcurementPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
