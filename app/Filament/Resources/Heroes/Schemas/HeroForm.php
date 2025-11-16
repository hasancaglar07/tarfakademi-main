<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('hero_tabs')
                    ->tabs([
                        Tab::make('Genel Bilgiler')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                FileUpload::make('background_image')
                                    ->label('Arka Plan Görseli')
                                    ->image()
                                    ->disk('public')
                                    ->directory('hero-backgrounds')
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                    ])
                                    ->helperText('Hero bölümünün arka plan görseli')
                                    ->columnSpanFull(),

                                Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true)
                                    ->helperText('Hero bölümü aktif olmazsa gösterilmez')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('İçerik')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Başlık')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        Textarea::make('subtitle')
                                            ->label('Alt Başlık')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make('CTA Butonları')
                            ->icon('heroicon-o-cursor-arrow-ripple')
                            ->schema([
                                Section::make('Birincil CTA')
                                    ->description('Ana eylem butonu')
                                    ->schema([
                                        TextInput::make('primary_cta_label')
                                            ->label('Buton Yazısı')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        TextInput::make('primary_cta_href')
                                            ->label('Buton Linki')
                                            ->required()
                                            ->url()
                                            ->maxLength(255)
                                            ->columnSpanFull(),
                                    ])
                                    ->columnSpanFull(),

                                Section::make('İkincil CTA')
                                    ->description('Alternatif eylem butonu')
                                    ->schema([
                                        TextInput::make('tertiary_cta_label')
                                            ->label('Buton Yazısı')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        TextInput::make('tertiary_cta_href')
                                            ->label('Buton Linki')
                                            ->required()
                                            ->url()
                                            ->maxLength(255)
                                            ->columnSpanFull(),
                                    ])
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('İstatistikler')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Repeater::make('stats')
                                    ->label('İstatistikler')
                                    ->schema([
                                        TextInput::make('value')
                                            ->label('Değer')
                                            ->required()
                                            ->maxLength(50)
                                            ->placeholder('5000+')
                                            ->columnSpan(1),

                                        TextInput::make('label')
                                            ->label('Etiket')
                                            ->required()
                                            ->maxLength(100)
                                            ->placeholder('Öğrenci')
                                            ->columnSpan(2),
                                    ])
                                    ->columns(3)
                                    ->defaultItems(0)
                                    ->addActionLabel('İstatistik Ekle')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Yeni İstatistik')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
