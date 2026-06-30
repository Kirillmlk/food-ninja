<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShortLinckResource\Pages;
use App\Filament\Resources\ShortLinckResource\RelationManagers;
use App\Models\ShortLink;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ShortLinckResource extends Resource
{
    protected static ?string $model = ShortLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * @return Builder<ShortLink>
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    #[\Override]
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make('short_url')
                    ->label('Короткая ссылка')
                    ->content(fn (?ShortLink $record): string => $record?->code ? url($record->code) : '')
                    ->visibleOn('edit'),

                TextInput::make('original_url')
                    ->label('Оригинальный URL')
                    ->required()
                    ->url(),
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Короткая ссылка')
                    ->formatStateUsing(fn (string $state): string => url($state)),

                TextColumn::make('original_url')
                    ->label('URL')
                    ->limit(50),

                TextColumn::make('url_clicks_count')
                    ->label('Клики')
                    ->counts('urlClicks'),

                TextColumn::make('created_at')
                    ->label('Создана')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            RelationManagers\UrlClicksRelationManager::class,
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShortLincks::route('/'),
            'create' => Pages\CreateShortLinck::route('/create'),
            'edit' => Pages\EditShortLinck::route('/{record}/edit'),
        ];
    }

}
