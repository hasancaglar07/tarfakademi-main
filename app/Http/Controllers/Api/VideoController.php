<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    /**
     * Display a listing of videos
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        // Get video post type ID (assuming it's 2 for videos)
        $videoPostTypeId = 2;

        $videos = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', $videoPostTypeId)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $transformedVideos = $videos->map(function ($video) use ($locale) {
            return $this->transformVideo($video, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => $transformedVideos,
            'meta' => [
                'current_page' => $videos->currentPage(),
                'last_page' => $videos->lastPage(),
                'per_page' => $videos->perPage(),
                'total' => $videos->total(),
            ],
        ]);
    }

    /**
     * Display the specified video
     *
     * @param string $locale
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $locale, string $slug): JsonResponse
    {
        app()->setLocale($locale);

        $videoPostTypeId = 2;

        $video = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', $videoPostTypeId)
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get related videos
        $relatedVideos = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->where('post_type_id', $videoPostTypeId)
            ->where('id', '!=', $video->id)
            ->limit(6)
            ->get();

        $transformedRelatedVideos = $relatedVideos->map(function ($relatedVideo) use ($locale) {
            return $this->transformVideo($relatedVideo, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => [
                'video' => $this->transformVideo($video, $locale, true),
                'related_videos' => $transformedRelatedVideos,
            ],
        ]);
    }

    /**
     * Transform video post to API response format
     *
     * @param Post $video
     * @param string $locale
     * @param bool $includeContent
     * @return array
     */
    private function transformVideo(Post $video, string $locale, bool $includeContent = false): array
    {
        $data = [
            'id' => $video->id,
            'title' => get_translation_with_fallback($video, 'title', $locale),
            'slug' => get_translation_with_fallback($video, 'slug', $locale),
            'excerpt' => get_translation_with_fallback($video, 'excerpt', $locale),
            'featured_image' => $video->hasMedia('featured_image')
                ? $video->getFirstMediaUrl('featured_image', 'large')
                : null,
            'youtube_url' => $video->youtube_url,
            'youtube_video_id' => $video->getYouTubeVideoId(),
            'youtube_thumbnail' => $video->getYouTubeThumbnailUrl(),
            'youtube_embed_code' => $video->getYouTubeEmbedCode(),
            'category' => $video->category ? [
                'id' => $video->category->id,
                'name' => get_translation_with_fallback($video->category, 'name', $locale),
                'slug' => get_translation_with_fallback($video->category, 'slug', $locale),
            ] : null,
            'author' => $video->user ? [
                'id' => $video->user->id,
                'name' => $video->user->name,
            ] : null,
            'created_at' => $video->created_at->toISOString(),
            'updated_at' => $video->updated_at->toISOString(),
        ];

        if ($includeContent) {
            $data['content'] = get_translation_with_fallback($video, 'content', $locale);
        }

        return $data;
    }
}