<?php
declare(strict_types = 1);

namespace App\Http\Provider;

use App\Http\SubstituteBinding\TeacherSubstituteBinding;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class SubstituteBindingProvider
 *
 * @package App\Http\Provider
 */
class SubstituteBindingProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        /** @var Router $router */
        $router = $this->app->make(Router::class);
        $router->bind('teacher', TeacherSubstituteBinding::class);
    }
}
