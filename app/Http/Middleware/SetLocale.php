<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get locale from URL parameter first, then session, then default
        $locale = $request->route('locale') ?? Session::get('locale', config('app.locale'));

        // Validate locale
        if (! in_array($locale, ['tr', 'en', 'ar'])) {
            $locale = 'tr'; // Default to Turkish
        }

        // Set the application locale
        App::setLocale($locale);

        // Store the locale in session for persistence
        Session::put('locale', $locale);

        return $next($request);
    }
}
