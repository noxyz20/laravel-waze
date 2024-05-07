<?php

namespace Noxyz20\LaravelWaze\Facades;

use Illuminate\Support\Facades\Facade;

class Waze extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Noxyz20\LaravelWaze\Waze::class;
    }
}