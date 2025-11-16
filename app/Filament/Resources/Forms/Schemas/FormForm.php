<?php

namespace App\Filament\Resources\Forms\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class FormForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('form_tabs')
                    ->tabs([
                        Tab::make('Temel Bilgiler')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Form Adı')
                                    ->required()
                                    ->maxLength(255)
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                    ->columnSpanFull(),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->helperText('Form URL\'de kullanılacak benzersiz isim')
                                    ->columnSpanFull(),

                                Textarea::make('description')
                                    ->label('Açıklama')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true)
                                    ->helperText('Form aktif olmazsa kullanıcılar gönderi yapamaz')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Tab::make('Form Alanları')
                            ->icon('heroicon-o-queue-list')
                            ->badge(fn ($record) => $record ? $record->fields()->count() : null)
                            ->schema([
                                Repeater::make('fields')
                                    ->relationship('fields')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Alan Etiketi')
                                                    ->required()
                                                    ->reactive()
                                                    ->afterStateUpdated(fn ($state, callable $set, $get) => ! $get('name') ? $set('name', Str::slug(Str::lower($state), '_')) : null
                                                    )
                                                    ->columnSpan(1),

                                                TextInput::make('name')
                                                    ->label('Alan Adı (name)')
                                                    ->required()
                                                    ->helperText('Teknik alan adı (ör: full_name)')
                                                    ->columnSpan(1),

                                                Select::make('type')
                                                    ->label('Alan Tipi')
                                                    ->required()
                                                    ->options([
                                                        'text' => 'Metin',
                                                        'email' => 'E-posta',
                                                        'tel' => 'Telefon',
                                                        'number' => 'Sayı',
                                                        'textarea' => 'Çok Satırlı Metin',
                                                        'select' => 'Seçim Kutusu',
                                                        'radio' => 'Radyo Düğmesi',
                                                        'checkbox' => 'Onay Kutusu',
                                                        'date' => 'Tarih',
                                                        'file' => 'Dosya',
                                                    ])
                                                    ->reactive()
                                                    ->columnSpan(1),
                                            ]),

                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('placeholder')
                                                    ->label('Yer Tutucu (Placeholder)')
                                                    ->columnSpan(1),

                                                TextInput::make('help_text')
                                                    ->label('Yardım Metni')
                                                    ->columnSpan(1),
                                            ]),

                                        Grid::make(3)
                                            ->schema([
                                                Toggle::make('is_required')
                                                    ->label('Zorunlu Alan')
                                                    ->default(false)
                                                    ->columnSpan(1),

                                                Toggle::make('is_active')
                                                    ->label('Aktif')
                                                    ->default(true)
                                                    ->columnSpan(1),

                                                TextInput::make('order')
                                                    ->label('Sıra')
                                                    ->numeric()
                                                    ->default(0)
                                                    ->columnSpan(1),
                                            ]),

                                        Textarea::make('options')
                                            ->label('Seçenekler')
                                            ->helperText('Her satıra bir seçenek yazın (select, radio, checkbox için)')
                                            ->rows(3)
                                            ->visible(fn ($get) => in_array($get('type'), ['select', 'radio', 'checkbox']))
                                            ->dehydrateStateUsing(fn ($state) => $state ? array_filter(array_map('trim', explode("\n", $state))) : null)
                                            ->formatStateUsing(fn ($state) => is_array($state) ? implode("\n", $state) : $state)
                                            ->columnSpanFull(),

                                        Textarea::make('validation_rules')
                                            ->label('Doğrulama Kuralları')
                                            ->helperText('Laravel validation kuralları (ör: min:3, max:100)')
                                            ->rows(2)
                                            ->dehydrateStateUsing(fn ($state) => $state ? array_filter(array_map('trim', explode(',', $state))) : null)
                                            ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : $state)
                                            ->columnSpanFull(),
                                    ])
                                    ->orderColumn('order')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Yeni Alan')
                                    ->defaultItems(0)
                                    ->addActionLabel('Alan Ekle')
                                    ->columnSpanFull()
                                    ->cloneable(),
                            ]),

                        Tab::make('Ayarlar')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                TextInput::make('submit_button_text')
                                    ->label('Gönder Butonu Metni')
                                    ->default('Gönder')
                                    ->maxLength(255)
                                    ->columnSpan(1),

                                Textarea::make('success_message')
                                    ->label('Başarı Mesajı')
                                    ->rows(2)
                                    ->helperText('Form gönderildikten sonra gösterilecek mesaj')
                                    ->columnSpan(1),

                                TextInput::make('redirect_url')
                                    ->label('Yönlendirme URL')
                                    ->url()
                                    ->helperText('Form gönderildikten sonra yönlendirilecek sayfa (opsiyonel)')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Tab::make('E-posta Bildirimleri')
                            ->icon('heroicon-o-envelope')
                            ->badge(fn ($record) => $record?->send_email_notification ? '✓' : null)
                            ->schema([
                                Toggle::make('send_email_notification')
                                    ->label('E-posta Bildirimi Gönder')
                                    ->default(false)
                                    ->reactive()
                                    ->columnSpanFull(),

                                TextInput::make('notification_email')
                                    ->label('Bildirim E-posta Adresi')
                                    ->email()
                                    ->visible(fn ($get) => $get('send_email_notification'))
                                    ->required(fn ($get) => $get('send_email_notification'))
                                    ->helperText('Form gönderileri bu e-posta adresine gönderilecek')
                                    ->columnSpan(1),
                            ])
                            ->columns(2),

                        Tab::make('Medya')
                            ->icon('heroicon-o-photo')
                            ->badge(fn ($record) => $record?->hasMedia('cover_image') ? '✓' : null)
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('cover_image')
                                    ->disk('public')
                                    ->label('Kapak Fotoğrafı')
                                    ->collection('cover_image')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->columnSpanFull()
                                    ->helperText('Form sayfasının kapak görseli'),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString()
                    ->contained(true),
            ]);
    }
}
