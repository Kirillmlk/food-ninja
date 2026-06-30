<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShortLinckResource\Pages;
use App\Models\ShortLink;
use Filament\Forms;
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('original_url')
                ->label('URL')
                ->required()
                ->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Код')
                    ->searchable(),

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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShortLincks::route('/'),
            'create' => Pages\CreateShortLinck::route('/create'),
            'edit' => Pages\EditShortLinck::route('/{record}/edit'),
        ];
    }
}
