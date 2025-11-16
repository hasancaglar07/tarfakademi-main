<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFactory;

class CalloutBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'callout';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action->form([
            TextInput::make('title')
                ->label('Başlık')
                ->required(),
            Textarea::make('content')
                ->label('İçerik')
                ->rows(3)
                ->required(),
            Select::make('variant')
                ->label('Stil')
                ->options([
                    'info' => 'Bilgi',
                    'success' => 'Başarılı',
                    'warning' => 'Uyarı',
                    'danger' => 'Hata',
                ])
                ->default('info'),
            ColorPicker::make('color')
                ->label('Özel Renk'),
        ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return $config['title'] ?? 'Callout';
    }

    public static function toPreviewHtml(array $config): ?string
    {
        return self::renderView('app.filament.forms.components.rich-editor.rich-content-custom-blocks.callout.preview', $config);
    }

    public static function toHtml(array $config, array $data): ?string
    {
        return self::renderView('app.filament.forms.components.rich-editor.rich-content-custom-blocks.callout.index', $config);
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


