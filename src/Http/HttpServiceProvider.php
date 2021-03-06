<?php
declare(strict_types = 1);

namespace App\Http;

use App\Http\Provider\RequestMapperProvider;
use App\Http\Provider\RouteServiceProvider;
use App\Http\Provider\SubstituteBindingProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class HttpServiceProvider
 *
 * @package App\Http
 */
class HttpServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RequestMapperProvider::class);
        $this->app->register(SubstituteBindingProvider::class);
    }
}
