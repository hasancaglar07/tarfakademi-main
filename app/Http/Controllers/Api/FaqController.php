<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        $faqs = Faq::where('is_active', true)
            ->orderBy('order')
            ->get();

        $transformedFaqs = $faqs->map(function ($faq) use ($locale) {
            return [
                'id' => $faq->id,
                'question' => get_translation_with_fallback($faq, 'question', $locale),
                'answer' => get_translation_with_fallback($faq, 'answer', $locale),
                'order' => $faq->order,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $transformedFaqs,
        ]);
    }
}