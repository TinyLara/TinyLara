<?php

namespace App;

class Kernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    public $routeMiddleware = [
        'test' => \App\Middleware\Test::class,
    ];
}
