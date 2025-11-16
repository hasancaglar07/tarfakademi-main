<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     */
    public function switch(string $locale): \Illuminate\Http\RedirectResponse
    {
        // Validate that the locale is supported
        if (! in_array($locale, ['tr', 'en', 'ar'])) {
            abort(404);
        }

        // Set the application locale
        App::setLocale($locale);

        // Store the locale in session for persistence
        Session::put('locale', $locale);

        // Get the previous URL and replace the locale in it
        $previousUrl = url()->previous();
        $currentLocale = request()->segment(1);

        // Check if the previous URL contains a locale prefix
        if (in_array($currentLocale, ['tr', 'en', 'ar'])) {
            $newUrl = preg_replace('/\/'.$currentLocale.'(\/|$)/', '/'.$locale.'$1', $previousUrl);
        } else {
            $newUrl = '/'.$locale;
        }

        return redirect($newUrl);
    }
}
