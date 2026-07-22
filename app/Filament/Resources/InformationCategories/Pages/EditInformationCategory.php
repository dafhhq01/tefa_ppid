<?php

namespace App\Filament\Resources\InformationCategories\Pages;

use App\Filament\Resources\InformationCategories\InformationCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInformationCategory extends EditRecord
{
    protected static string $resource = InformationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
