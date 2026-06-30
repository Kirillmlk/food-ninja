<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShortLink extends Model
{
    protected $fillable = [
        'user_id',
        'original_url',
        'code',
    ];

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return HasMany<UrlClick, $this> */
    public function urlClicks(): HasMany
    {
        return $this->hasMany(UrlClick::class);
    }
}
