<?php

namespace Spinnov\LaraTwilio\Facades;

use Illuminate\Support\Facades\Facade;

class LaraTwilio extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'laratwilio';
    }
}
