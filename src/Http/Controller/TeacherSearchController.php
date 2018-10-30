<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Domain\Teacher\Search\TeacherSearchManager;
use App\Framework\RequestMapper\RequestMapper;
use App\Http\RequestData\TeachersGetRequestData;
use App\Http\Transformer\TeacherSearch\TeacherSearchTransformer;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Item;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class TeacherSearchController
 *
 * @package App\Http\Controller
 */
class TeacherSearchController
{
    /**
     * @var RequestMapper
     */
    private $requestMapper;

    /**
     * @var FractalManager
     */
    private $fractalManager;

    /**
     * @var TeacherSearchManager
     */
    private $teacherScheduleSearchManager;

    /**
     * TeacherSearchController constructor.
     *
     * @param RequestMapper        $requestMapper
     * @param FractalManager       $fractalManager
     * @param TeacherSearchManager $teacherScheduleSearchManager
     */
    public function __construct(
        RequestMapper $requestMapper,
        FractalManager $fractalManager,
        TeacherSearchManager $teacherScheduleSearchManager
    ) {
        $this->requestMapper = $requestMapper;
        $this->fractalManager = $fractalManager;
        $this->teacherScheduleSearchManager = $teacherScheduleSearchManager;
    }

    /**
     * @return JsonResponse
     * @throws \App\Framework\RequestMapper\RequestMapperException
     */
    public function __invoke(): JsonResponse
    {
        /** @var TeachersGetRequestData $payload */
        $payload = $this->requestMapper->map(TeachersGetRequestData::class);

        $teacherSearchResult = $this->teacherScheduleSearchManager->find($payload);

        return JsonResponse::create(
            $this->fractalManager->createData(new Item($teacherSearchResult, new TeacherSearchTransformer()))->toArray()
        );
    }
}
