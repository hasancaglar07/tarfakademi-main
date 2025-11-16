<?php

namespace App\Filament\Resources\Media\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('media')
                    ->label('Önizleme')
                    ->collection('default')
                    ->conversion('thumb')
                    ->size(60)
                    ->square(),

                TextColumn::make('name')
                    ->label('Dosya Adı')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('file_name')
                    ->label('Orijinal Dosya Adı')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('mime_type')
                    ->label('MIME Tipi')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        str_starts_with($state, 'image/') => 'success',
                        str_starts_with($state, 'video/') => 'warning',
                        str_starts_with($state, 'audio/') => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('collection_name')
                    ->label('Koleksiyon')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'images' => 'success',
                        'documents' => 'warning',
                        'videos' => 'danger',
                        'audio' => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('size')
                    ->label('Boyut')
                    ->formatStateUsing(fn (int $state): string => self::formatBytes($state))
                    ->sortable(),

                TextColumn::make('model_type')
                    ->label('Bağlı Model')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('created_at')
                    ->label('Oluşturulma Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('collection_name')
                    ->label('Koleksiyon')
                    ->options([
                        'default' => 'Varsayılan',
                        'images' => 'Resimler',
                        'documents' => 'Dokümanlar',
                        'videos' => 'Videolar',
                        'audio' => 'Ses Dosyaları',
                    ]),

                SelectFilter::make('mime_type')
                    ->label('MIME Tipi')
                    ->options([
                        'image/jpeg' => 'JPEG Resim',
                        'image/png' => 'PNG Resim',
                        'image/gif' => 'GIF Resim',
                        'image/webp' => 'WebP Resim',
                        'video/mp4' => 'MP4 Video',
                        'video/avi' => 'AVI Video',
                        'audio/mp3' => 'MP3 Ses',
                        'audio/wav' => 'WAV Ses',
                        'application/pdf' => 'PDF Doküman',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    private static function formatBytes(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision).' '.$units[$i];
    }
}
