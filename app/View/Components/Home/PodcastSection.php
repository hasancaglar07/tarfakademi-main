<?php

namespace App\View\Components\Home;

use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\View\View;

class PodcastSection extends Component
{
    public $podcasts;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->podcasts = Post::with(['category', 'postType'])
            ->where('post_type_id', 11) // Podcast post type ID
            ->active()
            ->latest()
            ->limit(4)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.home.podcast-section');
    }
}
