<?php

declare(strict_types=1);

namespace App\Filament\Resources\ShortLinckResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UrlClicksRelationManager extends RelationManager
{
    protected static string $relationship = 'urlClicks';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ip')
            ->columns([
                TextColumn::make('ip')
                    ->label('IP'),

                TextColumn::make('clicked_at')
                    ->label('Когда')
                    ->dateTime(),
            ])
            ->headerActions([])
            ->actions([])
            ->bulkActions([]);
    }
}
