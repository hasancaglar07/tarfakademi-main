<?php

namespace App\View\Components\Home;

use App\Models\Hero as HeroModel;
use Illuminate\View\Component;
use Illuminate\View\View;

class Hero extends Component
{
    public ?HeroModel $hero = null;

    public function __construct()
    {
        $this->hero = HeroModel::query()
            ->active()
            ->latest()
            ->first();
    }

    public function render(): View
    {
        return view('components.home.hero', [
            'hero' => $this->hero,
        ]);
    }
}
