<?php

namespace App\Http\Controllers;

use App\Models\Post;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 5) // Event post type
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('events.index', compact('events'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $slug)
    {
        $event = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 5) // Event post type
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get related events from the same category
        $relatedEvents = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->where('post_type_id', 5) // Event post type
            ->where('id', '!=', $event->id)
            ->where('category_id', $event->category_id)
            ->limit(3)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
}
