<?php

namespace App\Support;

use Illuminate\Support\Facades\App as BaseApp;

class App extends BaseApp
{
    public static function runningSolelyInConsole(): bool
    {
        return parent::runningInConsole() && !parent::runningUnitTests();
    }
}