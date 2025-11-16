<?php

namespace App\Http\Controllers;

use App\Models\Post;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 10) // Video post type ID
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('video.index', compact('videos'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $video)
    {
        $video = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 10) // Video post type ID
            ->where(function ($query) use ($video) {
                $query->whereJsonContains('slug->tr', $video)
                    ->orWhereJsonContains('slug->en', $video)
                    ->orWhereJsonContains('slug->ar', $video);
            })
            ->firstOrFail();

        // Get related videos from the same category
        $relatedVideos = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->where('post_type_id', 12) // Video post type ID
            ->where('id', '!=', $video->id)
            ->where('category_id', $video->category_id)
            ->limit(3)
            ->get();

        return view('video.show', compact('video', 'relatedVideos'));
    }
}
