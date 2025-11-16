<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Hero;
use App\Models\Faq;
use App\Settings\GeneralSettings;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Get home page data for the specified locale
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $locale = $request->input('locale', 'tr');
        app()->setLocale($locale);

        // Heroes (Slider)
        $heroes = Hero::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($hero) use ($locale) {
                return [
                    'id' => $hero->id,
                    'title' => get_translation_with_fallback($hero, 'title', $locale),
                    'subtitle' => get_translation_with_fallback($hero, 'subtitle', $locale),
                    'description' => get_translation_with_fallback($hero, 'description', $locale),
                    'button_text' => get_translation_with_fallback($hero, 'button_text', $locale),
                    'button_url' => get_translation_with_fallback($hero, 'button_url', $locale),
                    'image' => $hero->hasMedia('image') ? $hero->getFirstMediaUrl('image', 'large') : null,
                    'background_image' => $hero->hasMedia('background_image') ? $hero->getFirstMediaUrl('background_image', 'large') : null,
                ];
            });

        // Blog Posts (Son 6)
        $blogPosts = Post::where('status', 'published')
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'blog');
            })
            ->with(['postType', 'category', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get()
            ->map(function ($post) use ($locale) {
                return $this->transformPost($post, $locale);
            });

        // Services (Hizmetler)
        $services = Post::where('status', 'published')
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'service');
            })
            ->with(['postType', 'category'])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get()
            ->map(function ($post) use ($locale) {
                return $this->transformPost($post, $locale);
            });

        // Events (Etkinlikler)
        $events = Post::where('status', 'published')
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'event');
            })
            ->with(['postType', 'category'])
            ->get()
            ->filter(function (Post $post) {
                $eventDate = $this->resolveEventDate($post);

                return $eventDate ? $eventDate->isFuture() : false;
            })
            ->sortBy(function (Post $post) {
                return $this->resolveEventDate($post);
            })
            ->take(4)
            ->values()
            ->map(function ($post) use ($locale) {
                return $this->transformPost($post, $locale);
            });

        // Videos (Son 4)
        $videos = Post::where('status', 'published')
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'video');
            })
            ->whereNotNull('youtube_url')
            ->with(['postType', 'category'])
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($post) use ($locale) {
                return $this->transformPost($post, $locale);
            });

        // Podcasts (Son 4)
        $podcasts = Post::where('status', 'published')
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'podcast');
            })
            ->with(['postType', 'category'])
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($post) use ($locale) {
                return $this->transformPost($post, $locale);
            });

        // FAQs
        $faqs = Faq::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($faq) use ($locale) {
                return [
                    'id' => $faq->id,
                    'question' => get_translation_with_fallback($faq, 'question', $locale),
                    'answer' => get_translation_with_fallback($faq, 'answer', $locale),
                    'order' => $faq->order,
                ];
            });

        // Categories
        $categories = Category::withCount('posts')
            ->orderBy('name')
            ->get()
            ->map(function ($category) use ($locale) {
                return [
                    'id' => $category->id,
                    'name' => get_translation_with_fallback($category, 'name', $locale),
                    'slug' => get_translation_with_fallback($category, 'slug', $locale),
                    'posts_count' => $category->posts_count,
                ];
            });

        // Settings
        $settings = app(GeneralSettings::class);

        return response()->json([
            'success' => true,
            'data' => [
                'heroes' => $heroes,
                'blog_posts' => $blogPosts,
                'services' => $services,
                'events' => $events,
                'videos' => $videos,
                'podcasts' => $podcasts,
                'faqs' => $faqs,
                'categories' => $categories,
                'settings' => [
                    'site_name' => $settings->site_name,
                    'site_description' => $settings->site_description,
                    'contact_email' => $settings->contact_email,
                    'contact_phone' => $settings->contact_phone,
                    'contact_address' => $settings->contact_address,
                ],
            ],
        ]);
    }

    /**
     * Transform post model to API response format
     *
     * @param Post $post
     * @param string $locale
     * @return array
     */
    private function transformPost(Post $post, string $locale): array
    {
        $eventDate = $this->resolveEventDate($post);

        return [
            'id' => $post->id,
            'title' => get_translation_with_fallback($post, 'title', $locale),
            'slug' => get_translation_with_fallback($post, 'slug', $locale),
            'excerpt' => get_translation_with_fallback($post, 'excerpt', $locale),
            'featured_image' => $post->hasMedia('featured_image')
                ? $post->getFirstMediaUrl('featured_image', 'large')
                : null,
            'youtube_url' => $post->youtube_url,
            'youtube_video_id' => $post->youtube_video_id,
            'event_date' => $eventDate?->toIso8601String(),
            'location' => $post->getMeta('location'),
            'map_url' => $post->getMeta('map_url'),
            'category' => $post->category ? [
                'id' => $post->category->id,
                'name' => get_translation_with_fallback($post->category, 'name', $locale),
                'slug' => get_translation_with_fallback($post->category, 'slug', $locale),
            ] : null,
            'post_type' => $post->postType ? [
                'id' => $post->postType->id,
                'name' => get_translation_with_fallback($post->postType, 'name', $locale),
                'slug' => get_translation_with_fallback($post->postType, 'slug', $locale),
            ] : null,
            'author' => $post->user ? [
                'name' => $post->user->name,
            ] : null,
            'created_at' => $post->created_at->toISOString(),
            'updated_at' => $post->updated_at->toISOString(),
        ];
    }

    /**
     * Apply translatable slug filtering for post types.
     */
    private function filterPostTypeBySlug($query, string $slug): void
    {
        $query->where(function ($slugQuery) use ($slug) {
            $slugQuery->whereJsonContains('slug->tr', $slug)
                ->orWhereJsonContains('slug->en', $slug)
                ->orWhereJsonContains('slug->ar', $slug);
        });
    }

    /**
     * Resolve event date stored inside meta bag.
     */
    private function resolveEventDate(Post $post): ?Carbon
    {
        $eventDate = $post->getMeta('event_date');

        if (! $eventDate) {
            return null;
        }

        try {
            return Carbon::parse($eventDate);
        } catch (\Throwable $exception) {
            return null;
        }
    }
}
