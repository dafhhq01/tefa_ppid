<?php

namespace App\Filament\Resources\InformationRequests\Pages;

use App\Filament\Resources\InformationRequests\InformationRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInformationRequest extends EditRecord
{
    protected static string $resource = InformationRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
