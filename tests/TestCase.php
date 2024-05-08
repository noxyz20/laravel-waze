<?php

namespace Noxyz20\LaravelWaze\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Noxyz20\LaravelWaze\WazeServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            WazeServiceProvider::class,
        ];
    }
}