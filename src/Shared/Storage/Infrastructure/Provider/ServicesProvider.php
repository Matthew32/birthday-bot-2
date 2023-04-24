<?php

namespace Shared\Storage\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Shared\Storage\Application\Services\Storage;

class ServicesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Storage::class, \Shared\Storage\Infrastructure\Services\Storage::class);
    }
}
