<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q', '');
        $results = collect();

        if (! empty($query)) {
            // Search in posts using Laravel Scout
            $scoutResults = Post::search($query)
                ->take(20) // Get more results to filter
                ->get();

            // Get the IDs from Scout results and fetch from database
            $postIds = $scoutResults->pluck('id')->toArray();
            $posts = Post::whereIn('id', $postIds)
                ->where('status', 'published')
                ->with(['category', 'postType', 'media'])
                ->orderByDesc('created_at')
                ->limit(10)
                ->get();

            // Search in categories (fallback to like query as Category doesn't use Scout)
            $categories = Category::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->limit(5)
                ->get();

            $results = $posts->concat($categories);
        }

        return view('search.index', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
