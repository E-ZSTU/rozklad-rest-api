<?php
declare(strict_types = 1);

namespace App\Http\Provider;

use App\Http\RequestDataStrategy\TeacherSearchStrategy;
use Illuminate\Support\ServiceProvider;
use Maksi\LaravelRequestMapper\StrategiesHandler;

/**
 * Class RequestMapperProvider
 *
 * @package App\Http\Provider
 */
class RequestMapperProvider extends ServiceProvider
{
    /**
     * @param StrategiesHandler $strategiesHandler
     */
    public function boot(StrategiesHandler $strategiesHandler): void
    {
        $strategiesHandler->addStrategy($this->app->make(TeacherSearchStrategy::class));
    }
}
