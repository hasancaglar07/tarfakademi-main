<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        $posts = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'blog');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $transformedPosts = $posts->map(function ($post) use ($locale) {
            return $this->transformPost($post, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => $transformedPosts,
            'meta' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
            ],
        ]);
    }

    /**
     * Display the specified blog post
     *
     * @param string $locale
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $locale, string $slug): JsonResponse
    {
        app()->setLocale($locale);

        $post = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'blog');
            })
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get related posts from the same category
        $relatedPosts = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->whereHas('postType', function ($query) {
                $this->filterPostTypeBySlug($query, 'blog');
            })
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->limit(3)
            ->get();

        $transformedRelatedPosts = $relatedPosts->map(function ($relatedPost) use ($locale) {
            return $this->transformPost($relatedPost, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => [
                'post' => $this->transformPost($post, $locale, true),
                'related_posts' => $transformedRelatedPosts,
            ],
        ]);
    }

    /**
     * Transform post model to API response format
     *
     * @param Post $post
     * @param string $locale
     * @param bool $includeContent
     * @return array
     */
    private function transformPost(Post $post, string $locale, bool $includeContent = false): array
    {
        $data = [
            'id' => $post->id,
            'title' => get_translation_with_fallback($post, 'title', $locale),
            'slug' => get_translation_with_fallback($post, 'slug', $locale),
            'excerpt' => get_translation_with_fallback($post, 'excerpt', $locale),
            'featured_image' => $post->hasMedia('featured_image')
                ? $post->getFirstMediaUrl('featured_image', 'large')
                : null,
            'featured_image_thumb' => $post->hasMedia('featured_image')
                ? $post->getFirstMediaUrl('featured_image', 'thumb')
                : null,
            'youtube_url' => $post->youtube_url,
            'youtube_video_id' => $post->getYouTubeVideoId(),
            'youtube_thumbnail' => $post->getYouTubeThumbnailUrl(),
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
                'id' => $post->user->id,
                'name' => $post->user->name,
            ] : null,
            'is_featured' => $post->is_featured,
            'created_at' => $post->created_at->toISOString(),
            'updated_at' => $post->updated_at->toISOString(),
        ];

        if ($includeContent) {
            $rawContent = get_translation_with_fallback($post, 'content', $locale);
            $data['content_raw'] = $rawContent;
            $data['content'] = render_rich_content($rawContent) ?? $rawContent;

            // Include gallery images if available
            if ($post->hasMedia('gallery')) {
                $data['gallery'] = $post->getMedia('gallery')->map(function ($media) {
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

    private function filterPostTypeBySlug($query, string $slug): void
    {
        $query->where(function ($slugQuery) use ($slug) {
            $slugQuery->whereJsonContains('slug->tr', $slug)
                ->orWhereJsonContains('slug->en', $slug)
                ->orWhereJsonContains('slug->ar', $slug);
        });
    }
}
