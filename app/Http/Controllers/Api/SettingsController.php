<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Illuminate\Http\JsonResponse;

class SettingsController extends Controller
{
    /**
     * Get general settings
     *
     * @param GeneralSettings $settings
     * @return JsonResponse
     */
    public function index(GeneralSettings $settings): JsonResponse
    {
        $locale = request()->get('locale', app()->getLocale());
        app()->setLocale($locale);

        return response()->json([
            'success' => true,
            'data' => [
                'site_name' => $settings->site_name,
                'site_description' => $settings->site_description,
                'contact_email' => $settings->contact_email,
                'contact_phone' => $settings->contact_phone,
                'contact_phone2' => $settings->contact_phone2,
                'contact_whatsapp' => $settings->contact_whatsapp,
                'contact_address' => $settings->contact_address,
                'contact_address_line1' => $settings->contact_address_line1,
                'contact_address_line2' => $settings->contact_address_line2,
                'contact_city' => $settings->contact_city,
                'contact_country' => $settings->contact_country,
                'contact_map_url' => $settings->contact_map_url,
                'social_facebook' => $settings->facebook_url,
                'social_twitter' => $settings->twitter_url,
                'social_instagram' => $settings->instagram_url,
                'social_linkedin' => $settings->linkedin_url,
                'social_youtube' => $settings->youtube_url,
                'logo_url' => $settings->logo_default,
                'logo_alt' => $settings->logo_alt,
                'logo_mobile' => $settings->logo_mobile,
                'favicon_url' => $settings->favicon,
                'footer_description' => $settings->footer_description,
                'privacy_policy_slug' => $settings->privacy_policy_slug,
                'terms_slug' => $settings->terms_slug,
                'copyright_slug' => $settings->copyright_slug,
                'cookie_prefs_slug' => $settings->cookie_prefs_slug,
            ],
        ]);
    }
}