<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Models\Post;
use App\Models\PostType;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ListRecords\Concerns\Translatable;

class ListPosts extends ListRecords
{
    use Translatable;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            LocaleSwitcher::make(),
        ];
    }

    public function getTabs(): array
    {
        $postTypes = PostType::all();
        $tabs = [];

        // All posts tab
        $tabs['all'] = Tab::make('Tümü')
            ->badge(Post::count())
            ->badgeColor('gray');

        // Individual post type tabs
        foreach ($postTypes as $postType) {
            $tabs[$postType->id] = Tab::make($postType->getTranslation('name', app()->getLocale()))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('post_type_id', $postType->id))
                ->badge(Post::where('post_type_id', $postType->id)->count())
                ->badgeColor('primary');
        }

        return $tabs;
    }
}
