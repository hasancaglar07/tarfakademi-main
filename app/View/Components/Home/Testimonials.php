<?php

namespace App\View\Components\Home;

use App\Models\Post;
use App\Models\PostType;
use Illuminate\View\Component;

class Testimonials extends Component
{
    public $testimonials;

    public function __construct()
    {
        // Get testimonial post type
        $testimonialPostType = PostType::where('name->tr', 'Referans')->first();

        if ($testimonialPostType) {
            $this->testimonials = Post::with(['postType', 'category'])
                ->where('post_type_id', $testimonialPostType->id)
                ->where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $this->testimonials = collect();
        }
    }

    public function render()
    {
        return view('components.home.testimonials');
    }
}
