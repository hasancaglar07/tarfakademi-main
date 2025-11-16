<?php

namespace App\Filament\Resources\PostTypes\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Yazı Türü Adı')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, $set, $get) {
                        if (! $get('slug')) {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        }
                    })
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->helperText('Boş bırakılırsa isimden otomatik oluşturulur'),

                Textarea::make('description')
                    ->label('Açıklama')
                    ->rows(3)
                    ->columnSpanFull(),

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
                    ->helperText('Yazı türünün kapak görseli'),
            ]);
    }
}
