<?php

namespace mradang\LaravelLog;

use Illuminate\Support\ServiceProvider;

class LaravelLogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(\dirname(__DIR__) . '/migrations/');
        }
    }
}
