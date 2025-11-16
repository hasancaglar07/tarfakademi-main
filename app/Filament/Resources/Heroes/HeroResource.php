<?php

namespace App\Filament\Resources\Heroes;

use App\Filament\Resources\Heroes\Pages\CreateHero;
use App\Filament\Resources\Heroes\Pages\EditHero;
use App\Filament\Resources\Heroes\Pages\ListHeroes;
use App\Filament\Resources\Heroes\Schemas\HeroForm;
use App\Filament\Resources\Heroes\Tables\HeroesTable;
use App\Models\Hero;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class HeroResource extends Resource
{
    use Translatable;

    protected static ?string $model = Hero::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Hero Bölümü';

    protected static ?string $modelLabel = 'Hero';

    protected static ?string $pluralModelLabel = 'Hero Bölümleri';

    protected static ?int $navigationSort = 1;

    public static function getDefaultTranslatableLocale(): string
    {
        return 'tr'; // Default to Turkish as it seems to be the primary language
    }

    public static function getTranslatableLocales(): array
    {
        return ['en', 'tr', 'ar']; // From AdminPanelProvider configuration
    }

    public static function getTranslatableAttributes(): array
    {
        return ['title', 'subtitle', 'primary_cta_label', 'primary_cta_href', 'tertiary_cta_label', 'tertiary_cta_href']; // Fields that are translatable
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->user()?->isAdmin() ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return HeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroesTable::configure($table);
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
            'index' => ListHeroes::route('/'),
            'create' => CreateHero::route('/create'),
            'edit' => EditHero::route('/{record}/edit'),
        ];
    }
}
