<?php

namespace App\Filament\Resources\FormSubmissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FormSubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('form.name')
                    ->label('Form')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('created_at')
                    ->label('Gönderim Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->searchable(),

                IconColumn::make('is_read')
                    ->label('Okundu')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('ip_address')
                    ->label('IP Adresi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('read_at')
                    ->label('Okunma Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('form_id')
                    ->label('Form')
                    ->relationship('form', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('is_read')
                    ->label('Durum')
                    ->options([
                        '0' => 'Okunmamış',
                        '1' => 'Okunmuş',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()
                    ->after(function ($record) {
                        if (! $record->is_read) {
                            $record->markAsRead();
                        }
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
