<?php

namespace M2S\LaravelNuxt\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class InvalidConfigurationException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report(): void
    {
        report($this);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return Response
     */
    public function render(): Response
    {
        if (App::environment(['local', 'staging']) || config('app.debug')) {
            return response('[Laravel/Nuxt]: '.$this->getMessage(), 404);
        }

        abort(404);
    }
}
