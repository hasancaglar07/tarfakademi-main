<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\JsonResponse;

class HeroController extends Controller
{
    /**
     * Display a listing of active heroes (sliders)
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        $heroes = Hero::where('is_active', true)
            ->orderBy('order')
            ->get();

        $transformedHeroes = $heroes->map(function ($hero) use ($locale) {
            return [
                'id' => $hero->id,
                'title' => get_translation_with_fallback($hero, 'title', $locale),
                'subtitle' => get_translation_with_fallback($hero, 'subtitle', $locale),
                'description' => get_translation_with_fallback($hero, 'description', $locale),
                'button_text' => get_translation_with_fallback($hero, 'button_text', $locale),
                'button_url' => get_translation_with_fallback($hero, 'button_url', $locale),
                'image' => $hero->hasMedia('image')
                    ? $hero->getFirstMediaUrl('image', 'large')
                    : null,
                'background_image' => $hero->hasMedia('background_image')
                    ? $hero->getFirstMediaUrl('background_image', 'large')
                    : null,
                'order' => $hero->order,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $transformedHeroes,
        ]);
    }
}