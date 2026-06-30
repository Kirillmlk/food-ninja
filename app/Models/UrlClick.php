<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UrlClick extends Model
{
    protected $fillable = [
        'short_link_id',
        'ip',
        'clicked_at',
    ];

    /** @return BelongsTo<ShortLink, $this> */
    public function shortLink(): BelongsTo
    {
        return $this->belongsTo(ShortLink::class);
    }
    #[\Override]
    protected function casts(): array
    {
        return [
            'clicked_at' => 'datetime',
        ];
    }
}
