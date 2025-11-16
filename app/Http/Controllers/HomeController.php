<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Blog kategorilerini ve postları al
        $blogCategories = Category::whereHas('posts', function ($query) {
            $query->where('status', 'published')
                  ->where('post_type_id', 1);
        })->with(['posts' => function ($query) {
            $query->where('status', 'published')
                  ->where('post_type_id', 1)
                  ->with(['postType', 'user'])
                  ->orderBy('created_at', 'desc')
                  ->limit(6);
        }])->get();

        // Tüm blog postları (kategori filtresi olmadan)
        $allPosts = Post::where('status', 'published')
            ->with(['postType', 'category', 'user'])
            ->where('post_type_id', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('welcome', compact('blogCategories', 'allPosts'));
    }
}
