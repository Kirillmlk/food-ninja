<?php

namespace App\Filament\Resources\ShortLinckResource\Pages;

use App\Filament\Resources\ShortLinckResource;
use App\Models\ShortLink;
use App\Services\ShortLinkService;
use Filament\Resources\Pages\CreateRecord;

class CreateShortLinck extends CreateRecord
{
    protected static string $resource = ShortLinckResource::class;

    protected function handleRecordCreation(array $data): ShortLink
    {
        return app(ShortLinkService::class)->createForUser(
            auth()->id(),
            $data['original_url'],
        );
    }
}
