<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostType;

class PageController extends Controller
{
    public function show(string $locale, string $page)
    {
        $pageType = PostType::where('name->tr', 'Sayfa')
            ->orWhere('name->en', 'Page')
            ->first();

        $post = null;

        if ($pageType) {
            $post = Post::where('status', 'published')
                ->with(['postType', 'user', 'media'])
                ->where('post_type_id', $pageType->id)
                ->where(function ($query) use ($page) {
                    $query->whereJsonContains('slug->tr', $page)
                        ->orWhereJsonContains('slug->en', $page)
                        ->orWhereJsonContains('slug->ar', $page);
                })
                ->first();
        }

        if (! $post) {
            abort(404);
        }

        return view('pages.show', ['page' => $post]);
    }
}
