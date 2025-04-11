<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($lang = $request->session()->get('locale')) {
            App::setLocale($lang);
        }

        return $next($request);
    }
}
