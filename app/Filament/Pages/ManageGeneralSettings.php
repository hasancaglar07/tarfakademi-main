<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageGeneralSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationLabel = 'Genel Ayarlar';

    protected static ?string $title = 'Genel Ayarlar';

    protected static UnitEnum|string|null $navigationGroup = 'Ayarlar';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('settings_tabs')
                    ->tabs([
                        Tab::make('Genel')
                            ->schema([
                                Section::make('Marka ve Genel Bilgiler')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('site_name')
                                                ->label('Site Adı')
                                                ->required()
                                                ->maxLength(255)
                                                ->columnSpan(6),
                                            Textarea::make('site_description')
                                                ->label('Kısa Açıklama')
                                                ->rows(3)
                                                ->maxLength(500)
                                                ->placeholder('Kurumsal kısa tanım – SEO ve footer için kullanılır.')
                                                ->columnSpan(6),
                                        ]),
                                        Grid::make(12)->schema([
                                            FileUpload::make('logo_default')
                                                ->label('Logo (Default)')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imageEditor()
                                                ->columnSpan(4),
                                            FileUpload::make('logo_alt')
                                                ->label('Logo (Alt)')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imageEditor()
                                                ->columnSpan(4),
                                            FileUpload::make('logo_mobile')
                                                ->label('Logo (Mobil)')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imageEditor()
                                                ->columnSpan(4),
                                        ]),
                                        FileUpload::make('favicon')
                                            ->label('Favicon')
                                            ->image()
                                            ->disk('public')
                                            ->directory('settings')
                                            ->imageEditor(),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('İletişim')
                            ->schema([
                                Section::make('İletişim Bilgileri')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('contact_email')
                                                ->label('E-posta')
                                                ->email()
                                                ->maxLength(255)
                                                ->placeholder('info@...')
                                                ->columnSpan(4),
                                            TextInput::make('contact_phone')
                                                ->label('Telefon')
                                                ->tel()
                                                ->maxLength(255)
                                                ->placeholder('+90 ...')
                                                ->columnSpan(4),
                                            TextInput::make('contact_phone2')
                                                ->label('Telefon 2 (Opsiyonel)')
                                                ->tel()
                                                ->maxLength(255)
                                                ->columnSpan(4),
                                        ]),
                                        Grid::make(12)->schema([
                                            TextInput::make('contact_whatsapp')
                                                ->label('WhatsApp Linki')
                                                ->url()
                                                ->placeholder('https://wa.me/...')
                                                ->columnSpan(4),
                                            TextInput::make('contact_map_url')
                                                ->label('Harita URL')
                                                ->url()
                                                ->placeholder('Google Maps konum linki')
                                                ->columnSpan(8),
                                        ]),
                                        Grid::make(12)->schema([
                                            TextInput::make('contact_address_line1')
                                                ->label('Adres Satır 1')
                                                ->maxLength(255)
                                                ->columnSpan(6),
                                            TextInput::make('contact_address_line2')
                                                ->label('Adres Satır 2')
                                                ->maxLength(255)
                                                ->columnSpan(6),
                                            TextInput::make('contact_city')
                                                ->label('Şehir')
                                                ->maxLength(255)
                                                ->columnSpan(4),
                                            TextInput::make('contact_country')
                                                ->label('Ülke')
                                                ->maxLength(255)
                                                ->columnSpan(4),
                                        ]),
                                        Textarea::make('contact_address')
                                            ->label('Adres (Serbest)')
                                            ->rows(3)
                                            ->maxLength(500),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Sosyal Medya')
                            ->schema([
                                Section::make('Sosyal Medya Linkleri')
                                    ->schema([
                                        TextInput::make('facebook_url')
                                            ->label('Facebook')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://facebook.com/...'),
                                        TextInput::make('twitter_url')
                                            ->label('Twitter / X')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://twitter.com/...'),
                                        TextInput::make('instagram_url')
                                            ->label('Instagram')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://instagram.com/...'),
                                        TextInput::make('linkedin_url')
                                            ->label('LinkedIn')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://linkedin.com/...'),
                                        TextInput::make('youtube_url')
                                            ->label('YouTube')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://youtube.com/...'),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Footer & Hukuki')
                            ->schema([
                                Section::make('Footer & Hukuki')
                                    ->schema([
                                        Textarea::make('footer_description')
                                            ->label('Footer Açıklaması')
                                            ->rows(3)
                                            ->maxLength(500),
                                        Grid::make(12)->schema([
                                            TextInput::make('privacy_policy_slug')
                                                ->label('Gizlilik Politikası Slug')
                                                ->maxLength(255)
                                                ->placeholder('gizlilik-politikasi')
                                                ->columnSpan(3),
                                            TextInput::make('terms_slug')
                                                ->label('Şartlar & Koşullar Slug')
                                                ->maxLength(255)
                                                ->placeholder('sartlar-ve-kosullar')
                                                ->columnSpan(3),
                                            TextInput::make('copyright_slug')
                                                ->label('Telif Hakkı Slug')
                                                ->maxLength(255)
                                                ->placeholder('telif-hakki')
                                                ->columnSpan(3),
                                            TextInput::make('cookie_prefs_slug')
                                                ->label('Çerez Tercihleri Slug')
                                                ->maxLength(255)
                                                ->placeholder('cerez-tercihleri')
                                                ->columnSpan(3),
                                        ]),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
