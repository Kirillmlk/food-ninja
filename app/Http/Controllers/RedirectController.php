<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(Request $request, string $code): RedirectResponse
    {
        $shortLink = ShortLink::where('code', $code)->firstOrFail();

        $shortLink->UrlClicks()->create([
            'ip' => $request->ip() ?? '0.0.0.0',
            'clicked_at' => now(),
        ]) ;

        return redirect()->away($shortLink->original_url);
    }
}
