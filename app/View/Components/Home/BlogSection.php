<?php

namespace App\View\Components\Home;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class BlogSection extends Component
{
    public $posts;
    public $blogCategories;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->posts = Post::with(['category', 'postType'])
            ->where('post_type_id', 1)
            ->active()
            ->latest()
            ->limit(4)
            ->get();

        $this->blogCategories = Category::where('post_type_id', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.home.blog-section');
    }
}
