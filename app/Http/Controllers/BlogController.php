<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id',     1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, string $slug)
    {

        $post = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 1)
            ->where(function ($query) use ($slug) {
                $query->whereJsonContains('slug->tr', $slug)
                    ->orWhereJsonContains('slug->en', $slug)
                    ->orWhereJsonContains('slug->ar', $slug);
            })
            ->firstOrFail();

        // Get related posts from the same category
        $relatedPosts = Post::where('status', 'published')
            ->with(['postType', 'category'])
            ->where('post_type_id', 1)
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->limit(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
