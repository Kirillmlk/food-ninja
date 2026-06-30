<?php

namespace App\Filament\Resources\ShortLinckResource\Pages;

use App\Filament\Resources\ShortLinckResource;
use App\Models\ShortLink;
use App\Services\ShortLinkService;
use Filament\Notifications\Notification;
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

    protected function afterCreate(): void
    {
        $shortUrl = url($this->record->code);

        Notification::make()
            ->title('Короткая ссылка создана')
            ->body($shortUrl)
            ->success()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }
}
