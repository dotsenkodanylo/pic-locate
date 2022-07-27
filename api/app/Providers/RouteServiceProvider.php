<?php

namespace App\Providers;

use App\Client\Pets\Models\Pet;
use App\Models\Camera;
use App\Models\Location;
use App\Models\Note;
use App\Models\Roll;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected  here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    public const UUID_REGEX = '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}';


    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $uuidModelKeys = [
            'camera',
            'roll',
            'location',
            'note'
        ];

        foreach ($uuidModelKeys as $key) {
            Route::pattern($key, self::UUID_REGEX);
        }

        Route::bind('camera', function (string $uuid) {
            return Camera::ofUuid($uuid)->firstOrFail();
        });

        Route::bind('roll', function (string $uuid) {
            return Roll::ofUuid($uuid)->firstOrFail();
        });

        Route::bind('location', function (string $uuid) {
            return Location::ofUuid($uuid)->firstOrFail();
        });

        Route::bind('note', function (string $uuid) {
            return Note::ofUuid($uuid)->firstOrFail();
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::any('{any}', function () {
                return response('Unauthorized', 401);
            });
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
