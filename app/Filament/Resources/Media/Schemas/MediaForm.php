<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                SpatieMediaLibraryFileUpload::make('media')
                    ->label('Medya Dosyası')
                    ->multiple()
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                    ->maxSize(10240) // 10MB
                    ->directory('media')
                    ->visibility('public')
                    ->required(),

                TextInput::make('name')
                    ->label('Dosya Adı')
                    ->required()
                    ->maxLength(255),

                Select::make('collection_name')
                    ->label('Koleksiyon')
                    ->options([
                        'default' => 'Varsayılan',
                        'images' => 'Resimler',
                        'documents' => 'Dokümanlar',
                        'videos' => 'Videolar',
                        'audio' => 'Ses Dosyaları',
                    ])
                    ->default('default')
                    ->required(),
            ]);
    }
}
