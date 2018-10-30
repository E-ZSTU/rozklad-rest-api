<?php
declare(strict_types = 1);

namespace App\Framework\Fractal;

use Illuminate\Support\ServiceProvider;
use League\Fractal\Manager;

/**
 * Class FractalServiceProvider
 *
 * @package App\Framework\Fractal
 */
class FractalServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Manager::class);
        /** @var Manager $fractalManager */
        $fractalManager = $this->app->make(Manager::class);
        $fractalManager->setSerializer(new NoDataSerializer());
    }
}
