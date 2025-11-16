<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('question')
                    ->label('Soru')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                RichEditor::make('answer')
                    ->label('Cevap')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'link',
                    ]),

                Grid::make(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Yayında')
                            ->default(true)
                            ->helperText('Bu SSS frontend\'de görünür olsun mu?'),

                        TextInput::make('order')
                            ->label('Sıralama')
                            ->numeric()
                            ->default(0)
                            ->helperText('Küçük sayı üstte görünür'),
                    ]),
            ]);
    }
}
