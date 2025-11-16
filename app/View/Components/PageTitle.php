<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
    public function __construct(
        public string $title,
        public ?string $subtitle = null,
        public ?string $background = '#282828',
        public ?string $padding = '10px',
        public ?string $color = 'white'
    ) {
    }

    public function render()
    {
        return view('components.page-title');
    }
}
