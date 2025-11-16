<?php

namespace App\View\Components\Home;

use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\View\View;

class ServicesTabs extends Component
{
    public array $tabs;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tabs = $this->getTabsFromDatabase();
    }

    /**
     * Get tabs data from database based on 'Faaliyet' post type
     */
    private function getTabsFromDatabase(): array
    {
        // Get posts with any post type, but filter out those without valid postType relationship
        $faaliyetPosts = Post::with('postType')
            ->where('status', 'published')
            ->where('post_type_id', 3)
            ->orderBy('created_at', 'desc')
            ->get()
            ->filter(function ($post) {
                // Only include posts that have a valid postType relationship
                return $post->postType !== null;
            })
            ->take(6); // Limit to 4 posts for tabs

        $tabs = [];

        foreach ($faaliyetPosts as $index => $post) {
            $title = get_translation_with_fallback($post, 'title');
            $excerpt = get_translation_with_fallback($post, 'excerpt');
            $slug = get_translation_with_fallback($post, 'slug');

            // Skip if essential data is missing
            if (empty($title) || empty($slug)) {
                continue;
            }

            $tabs[$slug] = [
                'label' => $title,
                'lead' => $excerpt ?: '',
                'cta' => localized_route('services.show', ['slug' => $slug]),
                'image' => $post->hasMedia('featured_image') ? $post->getFirstMediaUrl('featured_image', 'large') : null,
                'youtube_url' => $this->convertToEmbedUrl($post->youtube_url),
            ];
        }

        return $tabs;
    }

    /**
     * Convert YouTube URL to embed format
     */
    private function convertToEmbedUrl(?string $url): ?string
    {
        if (! $url) {
            return null;
        }

        // Handle different YouTube URL formats
        $patterns = [
            '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return 'https://www.youtube.com/embed/'.$matches[1];
            }
        }

        return null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.home.services-tabs');
    }
}
