<?php

namespace Api\Birthday\Infrastructure\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RoutesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api/birthday')
                ->middleware('api')
                ->group(base_path('src' . DIRECTORY_SEPARATOR . 'Api' . DIRECTORY_SEPARATOR . 'Birthday' . DIRECTORY_SEPARATOR . 'Infrastructure' . DIRECTORY_SEPARATOR. 'Routes' . DIRECTORY_SEPARATOR . 'route.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
