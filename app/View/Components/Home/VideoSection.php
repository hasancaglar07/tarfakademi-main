<?php

namespace App\View\Components\Home;

use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\View\View;

class VideoSection extends Component
{
    public $featuredVideo;
    public $videos;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Ana video (en son yayınlanan)
        $this->featuredVideo = Post::with(['category', 'postType', 'user'])
            ->where('post_type_id', 10) // Video post type ID
            ->active()
            ->latest()
            ->first();

        // Yan taraftaki video listesi (5 adet)
        $this->videos = Post::with(['category', 'postType', 'user'])
            ->where('post_type_id', 10) // Video post type ID
            ->active()
            ->latest()
            ->limit(5)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.home.video-section');
    }
}
