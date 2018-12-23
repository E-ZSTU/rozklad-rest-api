<?php
declare(strict_types = 1);

namespace App\Http\RequestDataStrategy;

use App\Http\RequestData\TeacherSearchRequestData;
use Illuminate\Http\Request;
use Maksi\LaravelRequestMapper\MappingStrategies\StrategyInterface;
use Maksi\LaravelRequestMapper\RequestData\RequestData;

/**
 * Class TeacherSearchStrategy
 *
 * @package App\Http\RequestDataStrategy
 */
class TeacherSearchStrategy implements StrategyInterface
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function resolve(Request $request): array
    {
        return $request->all();
    }

    /**
     * @param Request     $request
     * @param RequestData $object
     *
     * @return bool
     */
    public function support(Request $request, RequestData $object): bool
    {
        return $object instanceof TeacherSearchRequestData
            && $request->routeIs('teacher-search');

    }
}