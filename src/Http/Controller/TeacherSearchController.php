<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Domain\Teacher\Search\TeacherSearchManager;
use App\Framework\RequestMapper\RequestMapper;
use App\Http\RequestData\TeachersGetRequestData;
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
     * @var TeacherSearchManager
     */
    private $teacherScheduleSearchManager;

    /**
     * TeacherSearchController constructor.
     *
     * @param RequestMapper        $requestMapper
     * @param TeacherSearchManager $teacherScheduleSearchManager
     */
    public function __construct(
        RequestMapper $requestMapper,
        TeacherSearchManager $teacherScheduleSearchManager
    ) {
        $this->requestMapper = $requestMapper;
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

        return JsonResponse::create(
            $this->teacherScheduleSearchManager->find($payload)
        );
    }
}
