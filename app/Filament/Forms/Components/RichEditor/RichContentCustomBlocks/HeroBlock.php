<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFactory;

class HeroBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'hero';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action->form([
            TextInput::make('title')
                ->label('Başlık')
                ->required(),
            Textarea::make('subtitle')
                ->label('Alt Başlık')
                ->rows(3),
            TextInput::make('button_text')
                ->label('Buton Metni'),
            TextInput::make('button_url')
                ->label('Buton URL')
                ->url(),
            TextInput::make('image_url')
                ->label('Arkaplan Görsel (URL)'),
            Select::make('theme')
                ->label('Tema')
                ->options([
                    'light' => 'Açık',
                    'dark' => 'Koyu',
                ])
                ->default('light'),
        ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return $config['title'] ?? 'Hero';
    }

    public static function toPreviewHtml(array $config): ?string
    {
        return self::renderView('app.filament.forms.components.rich-editor.rich-content-custom-blocks.hero.preview', $config);
    }

    public static function toHtml(array $config, array $data): ?string
    {
        return self::renderView('app.filament.forms.components.rich-editor.rich-content-custom-blocks.hero.index', $config);
    }

    protected static function renderView(string $view, array $data): ?string
    {
        if (! ViewFactory::exists($view)) {
            return null;
        }

        /** @var View $rendered */
        $rendered = view($view, $data);

        return trim($rendered->render());
    }
}


