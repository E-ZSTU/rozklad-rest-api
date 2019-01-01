<?php
declare(strict_types = 1);

namespace App\Http\Provider;

use App\Http\RequestDataStrategy\TeacherSearchStrategy;
use Illuminate\Support\ServiceProvider;
use Maksi\LaravelRequestMapper\FillingChainProcessor;

/**
 * Class RequestMapperProvider
 *
 * @package App\Http\Provider
 */
class RequestMapperProvider extends ServiceProvider
{
    /**
     * @param FillingChainProcessor $fillingChainProcessor
     */
    public function boot(FillingChainProcessor $fillingChainProcessor): void
    {
        $fillingChainProcessor->addStrategy($this->app->make(TeacherSearchStrategy::class));
    }
}
