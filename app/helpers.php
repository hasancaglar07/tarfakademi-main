<?php

if (! function_exists('localized_route')) {
    /**
     * Generate a localized URL to a named route.
     */
    function localized_route(string $name, mixed $parameters = [], bool $absolute = true): string
    {
        $locale = app()->getLocale();

        // If parameters is not an array, convert it to an array
        if (! is_array($parameters)) {
            $parameters = $parameters ? [$parameters] : [];
        }

        // Add locale to parameters if not already present
        if (! isset($parameters['locale'])) {
            $parameters = array_merge(['locale' => $locale], $parameters);
        }

        return route($name, $parameters, $absolute);
    }
}

if (! function_exists('get_translation_with_fallback')) {
    /**
     * Get translation with fallback to Turkish if the requested locale doesn't exist.
     */
    function get_translation_with_fallback($model, string $attribute, ?string $locale = null): ?string
    {
        // Return null if model is null
        if ($model === null) {
            return null;
        }

        $locale = $locale ?? app()->getLocale();

        // Try to get translation in requested locale
        $translation = $model->getTranslation($attribute, $locale);

        // If translation doesn't exist and locale is not Turkish, try Turkish as fallback
        if (empty($translation) && $locale !== 'tr') {
            $translation = $model->getTranslation($attribute, 'tr');
        }

        // If still empty, try any available locale
        if (empty($translation)) {
            $availableLocales = ['tr', 'en', 'ar'];
            foreach ($availableLocales as $availableLocale) {
                $translation = $model->getTranslation($attribute, $availableLocale);
                if (! empty($translation)) {
                    break;
                }
            }
        }

        return $translation;
    }
}

if (! function_exists('render_rich_content')) {
    /**
     * Render rich content (HTML or TipTap JSON) using Filament's renderer.
     */
    function render_rich_content(string | array | null $content): ?string
    {
        if (blank($content)) {
            return null;
        }

        return \Filament\Forms\Components\RichEditor\RichContentRenderer::make($content)
            ->customBlocks([
                \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock::class,
                \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock::class,
            ])
            ->toHtml();
    }
}

if (! function_exists('is_event_upcoming')) {
    /**
     * Check if an event is upcoming (event date is in the future).
     */
    function is_event_upcoming($event): bool
    {
        if (! $event || ! $event->meta) {
            return false;
        }

        $eventDate = $event->getMeta('event_date');

        if (! $eventDate) {
            return false;
        }

        try {
            $eventDateTime = \Carbon\Carbon::parse($eventDate);

            return $eventDateTime->isFuture();
        } catch (\Exception $e) {
            return false;
        }
    }
}

if (! function_exists('get_video_image_url')) {
    /**
     * Get video image URL with fallback priority: cover_image -> featured_image -> default
     */
    function get_video_image_url($video, ?string $defaultUrl = null): ?string
    {
        if (! $video) {
            return $defaultUrl;
        }

        return $video->getFirstMediaUrl('cover_image')
            ?: $video->getFirstMediaUrl('featured_image')
            ?: $defaultUrl;
    }
}

if (! function_exists('get_video_alt_text')) {
    /**
     * Get video alt text with fallback
     */
    function get_video_alt_text($video): string
    {
        if (! $video) {
            return '';
        }

        return get_translation_with_fallback($video, 'title') ?: 'Video';
    }
}

if (! function_exists('get_video_slug')) {
    /**
     * Get video slug with fallback
     */
    function get_video_slug($video): ?string
    {
        if (! $video) {
            return null;
        }

        return get_translation_with_fallback($video, 'slug');
    }
}
