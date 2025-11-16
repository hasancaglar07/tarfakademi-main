<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display a listing of the FAQs.
     */
    public function index(): View
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('faq.index', compact('faqs'));
    }
}
