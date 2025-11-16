<?php

namespace App\View\Components\Home;

use App\Models\Post;
use Illuminate\View\Component;

class Events extends Component
{
    public $events;

    public function __construct()
    {

        $this->events = Post::with(['postType', 'category'])
            ->where('post_type_id', 5)
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();

    }

    public function render()
    {
        return view('components.home.events');
    }
}
