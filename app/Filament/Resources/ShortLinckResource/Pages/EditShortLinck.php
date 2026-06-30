<?php

namespace App\Filament\Resources\ShortLinckResource\Pages;

use App\Filament\Resources\ShortLinckResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShortLinck extends EditRecord
{
    protected static string $resource = ShortLinckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
