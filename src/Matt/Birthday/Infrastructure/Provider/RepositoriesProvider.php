<?php

namespace Matt\Birthday\Infrastructure\Provider;


use Illuminate\Support\ServiceProvider;
use Matt\Birthday\Domain\Repositories\BirthdayRepository;
use Matt\Birthday\Infrastructure\Repositories\StorageBirthdayRepository;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BirthdayRepository::class, StorageBirthdayRepository::class);
    }
}
