<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $podcasts = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 11) // Podcast post type ID
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('podcast.index', compact('podcasts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $podcast)
    {
        $podcast = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 11) // Podcast post type ID
            ->where(function ($query) use ($podcast) {
                $query->whereJsonContains('slug->tr', $podcast)
                    ->orWhereJsonContains('slug->en', $podcast)
                    ->orWhereJsonContains('slug->ar', $podcast);
            })
            ->firstOrFail();

        // Get related podcasts from the same category
        $relatedPodcasts = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->where('post_type_id', 11) // Podcast post type ID
            ->where('id', '!=', $podcast->id)
            ->where('category_id', $podcast->category_id)
            ->limit(3)
            ->get();

        return view('podcast.show', compact('podcast', 'relatedPodcasts'));
    }
}
