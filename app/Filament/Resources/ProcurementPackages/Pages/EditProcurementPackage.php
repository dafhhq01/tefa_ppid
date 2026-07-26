<?php

namespace App\Filament\Resources\ProcurementPackages\Pages;

use App\Filament\Resources\ProcurementPackages\ProcurementPackageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProcurementPackage extends EditRecord
{
    protected static string $resource = ProcurementPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
