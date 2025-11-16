<?php

namespace App\Filament\Resources\FormSubmissions\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FormSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Form Bilgisi')
                    ->schema([
                        Placeholder::make('form.name')
                            ->label('Form')
                            ->content(fn ($record) => $record->form->name),

                        Placeholder::make('created_at')
                            ->label('Gönderim Tarihi')
                            ->content(fn ($record) => $record->created_at->format('d.m.Y H:i:s')),

                        Toggle::make('is_read')
                            ->label('Okundu')
                            ->disabled(),

                        Placeholder::make('read_at')
                            ->label('Okunma Tarihi')
                            ->content(fn ($record) => $record->read_at?->format('d.m.Y H:i:s') ?? '-'),
                    ])
                    ->columns(2),

                Section::make('Gönderilen Veriler')
                    ->schema([
                        KeyValue::make('data')
                            ->label('Form Verileri')
                            ->disabled()
                            ->columnSpanFull(),
                    ]),

                Section::make('Teknik Bilgiler')
                    ->schema([
                        TextInput::make('ip_address')
                            ->label('IP Adresi')
                            ->disabled(),

                        TextInput::make('user_agent')
                            ->label('Tarayıcı Bilgisi')
                            ->disabled()
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}
