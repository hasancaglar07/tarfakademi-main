<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        $categories = Category::with(['posts' => function ($query) {
            $query->where('status', 'published')->limit(3);
        }])->get();

        $transformedCategories = $categories->map(function ($category) use ($locale) {
            return [
                'id' => $category->id,
                'name' => get_translation_with_fallback($category, 'name', $locale),
                'slug' => get_translation_with_fallback($category, 'slug', $locale),
                'description' => get_translation_with_fallback($category, 'description', $locale),
                'posts_count' => $category->posts()->where('status', 'published')->count(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $transformedCategories,
        ]);
    }

    /**
     * Display the specified category with its posts
     *
     * @param string $locale
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $locale, string $slug): JsonResponse
    {
        app()->setLocale($locale);

        $category = Category::where(function ($query) use ($slug) {
            $query->whereJsonContains('slug->tr', $slug)
                ->orWhereJsonContains('slug->en', $slug)
                ->orWhereJsonContains('slug->ar', $slug);
        })->firstOrFail();

        $posts = $category->posts()
            ->where('status', 'published')
            ->with(['postType', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $transformedPosts = $posts->map(function ($post) use ($locale) {
            return [
                'id' => $post->id,
                'title' => get_translation_with_fallback($post, 'title', $locale),
                'slug' => get_translation_with_fallback($post, 'slug', $locale),
                'excerpt' => get_translation_with_fallback($post, 'excerpt', $locale),
                'featured_image' => $post->hasMedia('featured_image')
                    ? $post->getFirstMediaUrl('featured_image', 'medium')
                    : null,
                'author' => $post->user ? ['name' => $post->user->name] : null,
                'created_at' => $post->created_at->toISOString(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'category' => [
                    'id' => $category->id,
                    'name' => get_translation_with_fallback($category, 'name', $locale),
                    'slug' => get_translation_with_fallback($category, 'slug', $locale),
                    'description' => get_translation_with_fallback($category, 'description', $locale),
                ],
                'posts' => $transformedPosts,
                'meta' => [
                    'current_page' => $posts->currentPage(),
                    'last_page' => $posts->lastPage(),
                    'per_page' => $posts->perPage(),
                    'total' => $posts->total(),
                ],
            ],
        ]);
    }
}