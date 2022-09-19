<?php

namespace M2S\LaravelNuxt\Facades;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as RouteFacade;
use M2S\LaravelNuxt\Http\Controllers\NuxtController;

class Nuxt
{
    /**
     * @param string $path
     * @return Route
     */
    public static function route(string $path): Route
    {
        return RouteFacade::get(
            '/'.trim(config('nuxt.prefix'), '/').'/'.trim($path, '/'),
            '\\'.NuxtController::class
        );
    }
}
