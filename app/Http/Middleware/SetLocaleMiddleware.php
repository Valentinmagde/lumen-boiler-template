<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-10
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        foreach (scandir(base_path("resources/lang")) as $jsonLangFile) {
            if (strlen($jsonLangFile) > 2)
                $availableLocales[substr($jsonLangFile, 0, 2)] 
                = substr($jsonLangFile, 0, 2);
        }

        in_array($request->input('lang'), $availableLocales) 
            ? $locale = $request->input('lang') 
            : $locale = env('APP_LOCALE','en');

        // Set the application's locale
        app('translator')->setLocale($locale);

        return $next($request);
    }
}