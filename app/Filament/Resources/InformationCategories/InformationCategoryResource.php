<?php

namespace App\Filament\Resources\InformationCategories;

use App\Filament\Resources\InformationCategories\Pages\CreateInformationCategory;
use App\Filament\Resources\InformationCategories\Pages\EditInformationCategory;
use App\Filament\Resources\InformationCategories\Pages\ListInformationCategories;
use App\Filament\Resources\InformationCategories\Schemas\InformationCategoryForm;
use App\Filament\Resources\InformationCategories\Tables\InformationCategoriesTable;
use App\Models\InformationCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InformationCategoryResource extends Resource
{
    protected static ?string $model = InformationCategory::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return InformationCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InformationCategoriesTable::configure($table);
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
            'index' => ListInformationCategories::route('/'),
            'create' => CreateInformationCategory::route('/create'),
            'edit' => EditInformationCategory::route('/{record}/edit'),
        ];
    }
}
