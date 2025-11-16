<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PodcastController extends Controller
{
    /**
     * Display a listing of podcasts
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        // Get podcast post type ID (assuming it's 4 for podcasts)
        $podcastPostTypeId = 4;

        $podcasts = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', $podcastPostTypeId)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $transformedPodcasts = $podcasts->map(function ($podcast) use ($locale) {
            return $this->transformPodcast($podcast, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => $transformedPodcasts,
            'meta' => [
                'current_page' => $podcasts->currentPage(),
                'last_page' => $podcasts->lastPage(),
                'per_page' => $podcasts->perPage(),
                'total' => $podcasts->total(),
            ],
        ]);
    }

    /**
     * Display the specified podcast
     *
     * @param string $locale
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $locale, string $slug): JsonResponse
    {
        app()->setLocale($locale);

        $podcastPostTypeId = 4;

        $podcast = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', $podcastPostTypeId)
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get related podcasts
        $relatedPodcasts = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->where('post_type_id', $podcastPostTypeId)
            ->where('id', '!=', $podcast->id)
            ->limit(6)
            ->get();

        $transformedRelatedPodcasts = $relatedPodcasts->map(function ($relatedPodcast) use ($locale) {
            return $this->transformPodcast($relatedPodcast, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => [
                'podcast' => $this->transformPodcast($podcast, $locale, true),
                'related_podcasts' => $transformedRelatedPodcasts,
            ],
        ]);
    }

    /**
     * Transform podcast post to API response format
     *
     * @param Post $podcast
     * @param string $locale
     * @param bool $includeContent
     * @return array
     */
    private function transformPodcast(Post $podcast, string $locale, bool $includeContent = false): array
    {
        $data = [
            'id' => $podcast->id,
            'title' => get_translation_with_fallback($podcast, 'title', $locale),
            'slug' => get_translation_with_fallback($podcast, 'slug', $locale),
            'excerpt' => get_translation_with_fallback($podcast, 'excerpt', $locale),
            'featured_image' => $podcast->hasMedia('featured_image')
                ? $podcast->getFirstMediaUrl('featured_image', 'large')
                : null,
            'youtube_url' => $podcast->youtube_url,
            'youtube_video_id' => $podcast->getYouTubeVideoId(),
            'category' => $podcast->category ? [
                'id' => $podcast->category->id,
                'name' => get_translation_with_fallback($podcast->category, 'name', $locale),
                'slug' => get_translation_with_fallback($podcast->category, 'slug', $locale),
            ] : null,
            'author' => $podcast->user ? [
                'id' => $podcast->user->id,
                'name' => $podcast->user->name,
            ] : null,
            'created_at' => $podcast->created_at->toISOString(),
            'updated_at' => $podcast->updated_at->toISOString(),
        ];

        if ($includeContent) {
            $data['content'] = get_translation_with_fallback($podcast, 'content', $locale);
        }

        return $data;
    }
}