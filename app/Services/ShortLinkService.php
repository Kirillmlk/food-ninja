<?php

namespace App\Services;


use App\Models\ShortLink;
use Illuminate\Support\Str;

class ShortLinkService
{
    public const CODE_LENGTH = 6;
    public function generateCode(): string
    {
        do {
            $code = Str::random(self::CODE_LENGTH);
        } while (ShortLink::where('code', $code)->exists());

        return $code;
    }

    public function createForUser(int $userId, string $originalUrl): ShortLink
    {
        return ShortLink::create([
            'user_id' => $userId,
            'original_url' => $originalUrl,
            'code' => $this->generateCode(),
        ]);
    }
}
