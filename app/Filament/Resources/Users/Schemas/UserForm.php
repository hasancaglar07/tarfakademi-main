<?php

namespace App\Filament\Resources\Users\Schemas;

use App\UserRole;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Ad Soyad')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('email')
                    ->label('E-posta')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),

                Select::make('role')
                    ->label('Rol')
                    ->options(UserRole::class)
                    ->required()
                    ->default(UserRole::Editor)
                    ->helperText('Kullanıcının sistemdeki yetki seviyesi')
                    ->columnSpanFull(),

                TextInput::make('password')
                    ->label('Şifre')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn ($state) => filled($state))
                    ->revealable()
                    ->minLength(8)
                    ->maxLength(255)
                    ->helperText('Şifre en az 8 karakter olmalıdır. Mevcut kullanıcıyı güncellerken boş bırakırsanız şifre değişmez.')
                    ->columnSpanFull(),

                DateTimePicker::make('email_verified_at')
                    ->label('E-posta Doğrulama Tarihi')
                    ->displayFormat('d.m.Y H:i')
                    ->seconds(false)
                    ->helperText('E-posta adresinin doğrulandığı tarih')
                    ->columnSpanFull(),
            ]);
    }
}
