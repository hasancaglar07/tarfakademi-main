<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Tarfakademi');
        $this->migrator->add('general.site_description', null);

        // Branding
        $this->migrator->add('general.logo_default', null);
        $this->migrator->add('general.logo_alt', null);
        $this->migrator->add('general.logo_mobile', null);
        $this->migrator->add('general.favicon', null);

        // Contact Information
        $this->migrator->add('general.contact_email', null);
        $this->migrator->add('general.contact_phone', null);
        $this->migrator->add('general.contact_phone2', null);
        $this->migrator->add('general.contact_whatsapp', null);
        $this->migrator->add('general.contact_address', null);
        $this->migrator->add('general.contact_address_line1', null);
        $this->migrator->add('general.contact_address_line2', null);
        $this->migrator->add('general.contact_city', null);
        $this->migrator->add('general.contact_country', null);
        $this->migrator->add('general.contact_map_url', null);

        // Social Media
        $this->migrator->add('general.facebook_url', null);
        $this->migrator->add('general.twitter_url', null);
        $this->migrator->add('general.instagram_url', null);
        $this->migrator->add('general.linkedin_url', null);
        $this->migrator->add('general.youtube_url', null);

        // Footer & Legal
        $this->migrator->add('general.footer_description', null);
        $this->migrator->add('general.privacy_policy_slug', null);
        $this->migrator->add('general.terms_slug', null);
        $this->migrator->add('general.copyright_slug', null);
        $this->migrator->add('general.cookie_prefs_slug', null);
    }
};
