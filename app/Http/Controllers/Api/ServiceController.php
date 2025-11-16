<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Display a listing of services
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        // Get service post type ID (assuming it's 5 for services)
        $servicePostTypeId = 5;

        $services = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', $servicePostTypeId)
            ->orderBy('created_at', 'desc')
            ->get();

        $transformedServices = $services->map(function ($service) use ($locale) {
            return $this->transformService($service, $locale);
        });

        return response()->json([
            'success' => true,
            'data' => $transformedServices,
        ]);
    }

    /**
     * Display the specified service
     *
     * @param string $locale
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $locale, string $slug): JsonResponse
    {
        app()->setLocale($locale);

        $servicePostTypeId = 5;

        $service = Post::where('status', 'published')
            ->with(['postType', 'category', 'user', 'children'])
            ->where('post_type_id', $servicePostTypeId)
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get child services (sub-services)
        $childServices = $service->children()
            ->where('status', 'published')
            ->get()
            ->map(function ($child) use ($locale) {
                return $this->transformService($child, $locale);
            });

        return response()->json([
            'success' => true,
            'data' => [
                'service' => $this->transformService($service, $locale, true),
                'child_services' => $childServices,
            ],
        ]);
    }

    /**
     * Transform service post to API response format
     *
     * @param Post $service
     * @param string $locale
     * @param bool $includeContent
     * @return array
     */
    private function transformService(Post $service, string $locale, bool $includeContent = false): array
    {
        $data = [
            'id' => $service->id,
            'title' => get_translation_with_fallback($service, 'title', $locale),
            'slug' => get_translation_with_fallback($service, 'slug', $locale),
            'excerpt' => get_translation_with_fallback($service, 'excerpt', $locale),
            'featured_image' => $service->hasMedia('featured_image')
                ? $service->getFirstMediaUrl('featured_image', 'large')
                : null,
            'featured_image_thumb' => $service->hasMedia('featured_image')
                ? $service->getFirstMediaUrl('featured_image', 'thumb')
                : null,
            'category' => $service->category ? [
                'id' => $service->category->id,
                'name' => get_translation_with_fallback($service->category, 'name', $locale),
                'slug' => get_translation_with_fallback($service->category, 'slug', $locale),
            ] : null,
            'parent_id' => $service->parent_id,
            'created_at' => $service->created_at->toISOString(),
            'updated_at' => $service->updated_at->toISOString(),
        ];

        if ($includeContent) {
            $data['content'] = get_translation_with_fallback($service, 'content', $locale);
            
            // Include gallery images if available
            if ($service->hasMedia('gallery')) {
                $data['gallery'] = $service->getMedia('gallery')->map(function ($media) {
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