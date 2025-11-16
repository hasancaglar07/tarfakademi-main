<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Post::where('status', 'published')
            ->with(['postType', 'category', 'user', 'media'])
            ->where('post_type_id', 3)
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('services.index', compact('services'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $slug)
    {
        $service = Post::where('status', 'published')
            ->with(['postType', 'category', 'user', 'media', 'tags', 'children'])
            ->where('post_type_id', 3)
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get root services (parent_id = 0) for tabs - same PostType
        $rootServices = Post::where('status', 'published')
            ->with(['postType', 'category', 'media'])
            ->where('post_type_id', $service->post_type_id)
            ->whereNull('parent_id')
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get children of current service for sidebar
        $childServices = $service->children()
            ->where('status', 'published')
            ->with(['postType', 'category', 'media'])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('services.show', compact('service', 'rootServices', 'childServices'));
    }
}
