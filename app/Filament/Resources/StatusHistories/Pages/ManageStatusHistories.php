<?php

namespace App\Filament\Resources\StatusHistories\Pages;

use App\Filament\Resources\StatusHistories\StatusHistoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStatusHistories extends ManageRecords
{
    protected static string $resource = StatusHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
