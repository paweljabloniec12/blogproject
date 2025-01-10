<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('LocaleMiddleware executing');
        Log::info('Current URL: ' . $request->url());
        Log::info('Session locale: ' . session('locale'));
        
        if (session()->has('locale')) {
            $locale = session('locale');
            Log::info('Setting locale to: ' . $locale);
            App::setLocale($locale);
        }
        
        Log::info('Final App locale: ' . App::getLocale());
        
        return $next($request);
    }
}