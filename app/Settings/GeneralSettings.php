<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name = 'Tarfakademi';

    public ?string $site_description = null;

    // Branding
    public ?string $logo_default = null;

    public ?string $logo_alt = null;

    public ?string $logo_mobile = null;

    public ?string $favicon = null;

    public ?string $contact_email = null;

    public ?string $contact_phone = null;

    public ?string $contact_phone2 = null;

    public ?string $contact_whatsapp = null;

    public ?string $contact_address = null;

    public ?string $contact_address_line1 = null;

    public ?string $contact_address_line2 = null;

    public ?string $contact_city = null;

    public ?string $contact_country = null;

    public ?string $contact_map_url = null;

    public ?string $facebook_url = null;

    public ?string $twitter_url = null;

    public ?string $instagram_url = null;

    public ?string $linkedin_url = null;

    public ?string $youtube_url = null;

    // Footer & Legal
    public ?string $footer_description = null;

    public ?string $privacy_policy_slug = null;

    public ?string $terms_slug = null;

    public ?string $copyright_slug = null;

    public ?string $cookie_prefs_slug = null;

    public static function group(): string
    {
        return 'general';
    }
}
