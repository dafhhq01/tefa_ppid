<?php

namespace App\Filament\Resources\ProcurementPackages\Pages;

use App\Filament\Resources\ProcurementPackages\ProcurementPackageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProcurementPackage extends ViewRecord
{
    protected static string $resource = ProcurementPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
