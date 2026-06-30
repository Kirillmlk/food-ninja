<?php

declare(strict_types=1);

namespace App\Filament\Resources\ShortLinckResource\Pages;

use App\Filament\Resources\ShortLinckResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShortLincks extends ListRecords
{
    protected static string $resource = ShortLinckResource::class;

    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
