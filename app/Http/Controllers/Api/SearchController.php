<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search for posts
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $locale = $request->get('locale', app()->getLocale());
        app()->setLocale($locale);

        $query = $request->get('q', '');
        $type = $request->get('type', 'all'); // all, blog, video, event, service, podcast

        if (empty($query)) {
            return response()->json([
                'success' => true,
                'data' => [],
                'meta' => [
                    'total' => 0,
                    'query' => $query,
                ],
            ]);
        }

        // Use Laravel Scout for search if available
        $postsQuery = Post::search($query)
            ->where('status', 'published');

        // Filter by post type if specified
        if ($type !== 'all') {
            $postTypeMap = [
                'blog' => 1,
                'video' => 2,
                'event' => 3,
                'podcast' => 4,
                'service' => 5,
            ];

            if (isset($postTypeMap[$type])) {
                $postsQuery->where('post_type_id', $postTypeMap[$type]);
            }
        }

        $posts = $postsQuery->paginate(20);

        $transformedPosts = collect($posts->items())->map(function ($post) use ($locale) {
            return [
                'id' => $post->id,
                'title' => get_translation_with_fallback($post, 'title', $locale),
                'slug' => get_translation_with_fallback($post, 'slug', $locale),
                'excerpt' => get_translation_with_fallback($post, 'excerpt', $locale),
                'featured_image' => $post->hasMedia('featured_image')
                    ? $post->getFirstMediaUrl('featured_image', 'thumb')
                    : null,
                'post_type' => $post->postType ? [
                    'id' => $post->postType->id,
                    'name' => get_translation_with_fallback($post->postType, 'name', $locale),
                    'slug' => get_translation_with_fallback($post->postType, 'slug', $locale),
                ] : null,
                'category' => $post->category ? [
                    'id' => $post->category->id,
                    'name' => get_translation_with_fallback($post->category, 'name', $locale),
                    'slug' => get_translation_with_fallback($post->category, 'slug', $locale),
                ] : null,
                'created_at' => $post->created_at->toISOString(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $transformedPosts,
            'meta' => [
                'query' => $query,
                'type' => $type,
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
            ],
        ]);
    }
}