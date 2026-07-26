<?php

namespace App\Filament\Resources\ProcurementPackages;

use App\Filament\Resources\ProcurementPackages\Pages\CreateProcurementPackage;
use App\Filament\Resources\ProcurementPackages\Pages\EditProcurementPackage;
use App\Filament\Resources\ProcurementPackages\Pages\ListProcurementPackages;
use App\Filament\Resources\ProcurementPackages\Pages\ViewProcurementPackage;
use App\Filament\Resources\ProcurementPackages\Schemas\ProcurementPackageForm;
use App\Filament\Resources\ProcurementPackages\Schemas\ProcurementPackageInfolist;
use App\Filament\Resources\ProcurementPackages\Tables\ProcurementPackagesTable;
use App\Models\ProcurementPackage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProcurementPackageResource extends Resource
{
    protected static ?string $model = ProcurementPackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;
    protected static string|\UnitEnum|null $navigationGroup = 'Publication & Document';

    protected static ?int $navigationSort = 4;
    protected static ?string $recordTitleAttribute = 'procurement package';

    public static function form(Schema $schema): Schema
    {
        return ProcurementPackageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProcurementPackageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProcurementPackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProcurementPackages::route('/'),
            'create' => CreateProcurementPackage::route('/create'),
            'view' => ViewProcurementPackage::route('/{record}'),
            'edit' => EditProcurementPackage::route('/{record}/edit'),
        ];
    }
}
