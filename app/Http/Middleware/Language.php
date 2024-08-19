<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the session has a 'language' key
        if (Session::has('language')) {
            // Get the language value from the session
            $language = Session::get('language');

            // Ensure the language value is a string before setting the locale
            if (is_string($language)) {
                App::setLocale($language);
            }
        }

        return $next($request);
    }
}
