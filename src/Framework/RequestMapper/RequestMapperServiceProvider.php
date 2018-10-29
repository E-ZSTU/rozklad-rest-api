<?php
declare(strict_types = 1);

namespace App\Framework\RequestMapper;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Validator\ContainerConstraintValidatorFactory;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;

/**
 * Class RequestMapperServiceProvider
 *
 * @package App\Framework\RequestMapper
 */
class RequestMapperServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        AnnotationRegistry::registerLoader('class_exists');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(ValidatorInterface::class, function () {
            return (new ValidatorBuilder())
                ->setConstraintValidatorFactory(new ContainerConstraintValidatorFactory($this->app))
                ->enableAnnotationMapping()
                ->getValidator();
        });
    }
}
