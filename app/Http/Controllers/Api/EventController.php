<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    /**
     * Display a listing of events
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        // Get event post type ID (assuming it's 3 for events)
        $eventPostTypeId = 3;

        $events = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', $eventPostTypeId)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $transformedEvents = $events->map(function ($event) use ($locale) {
            return $this->transformEvent($event, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => $transformedEvents,
            'meta' => [
                'current_page' => $events->currentPage(),
                'last_page' => $events->lastPage(),
                'per_page' => $events->perPage(),
                'total' => $events->total(),
            ],
        ]);
    }

    /**
     * Display the specified event
     *
     * @param string $locale
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $locale, string $slug): JsonResponse
    {
        app()->setLocale($locale);

        $eventPostTypeId = 3;

        $event = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', $eventPostTypeId)
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get related events
        $relatedEvents = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->where('post_type_id', $eventPostTypeId)
            ->where('id', '!=', $event->id)
            ->limit(3)
            ->get();

        $transformedRelatedEvents = $relatedEvents->map(function ($relatedEvent) use ($locale) {
            return $this->transformEvent($relatedEvent, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => [
                'event' => $this->transformEvent($event, $locale, true),
                'related_events' => $transformedRelatedEvents,
            ],
        ]);
    }

    /**
     * Transform event post to API response format
     *
     * @param Post $event
     * @param string $locale
     * @param bool $includeContent
     * @return array
     */
    private function transformEvent(Post $event, string $locale, bool $includeContent = false): array
    {
        $data = [
            'id' => $event->id,
            'title' => get_translation_with_fallback($event, 'title', $locale),
            'slug' => get_translation_with_fallback($event, 'slug', $locale),
            'excerpt' => get_translation_with_fallback($event, 'excerpt', $locale),
            'featured_image' => $event->hasMedia('featured_image')
                ? $event->getFirstMediaUrl('featured_image', 'large')
                : null,
            'featured_image_thumb' => $event->hasMedia('featured_image')
                ? $event->getFirstMediaUrl('featured_image', 'thumb')
                : null,
            'category' => $event->category ? [
                'id' => $event->category->id,
                'name' => get_translation_with_fallback($event->category, 'name', $locale),
                'slug' => get_translation_with_fallback($event->category, 'slug', $locale),
            ] : null,
            'author' => $event->user ? [
                'id' => $event->user->id,
                'name' => $event->user->name,
            ] : null,
            'event_date' => $event->getMeta('event_date'),
            'location' => $event->getMeta('location'),
            'map_url' => $event->getMeta('map_url'),
            'created_at' => $event->created_at->toISOString(),
            'updated_at' => $event->updated_at->toISOString(),
        ];

        if ($includeContent) {
            $data['content'] = get_translation_with_fallback($event, 'content', $locale);
            
            // Include gallery images if available
            if ($event->hasMedia('gallery')) {
                $data['gallery'] = $event->getMedia('gallery')->map(function ($media) {
                    return [
                        'url' => $media->getUrl(),
                        'thumb' => $media->getUrl('thumb'),
                        'medium' => $media->getUrl('medium'),
                    ];
                });
            }
        }

        return $data;
    }
}