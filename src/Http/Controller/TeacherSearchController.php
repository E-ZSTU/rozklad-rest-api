<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Domain\Teacher\Search\TeacherScheduleSearchManager;
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
     * @var TeacherScheduleSearchManager
     */
    private $teacherScheduleSearchManager;

    /**
     * TeacherSearchController constructor.
     *
     * @param RequestMapper                $requestMapper
     * @param TeacherScheduleSearchManager $teacherScheduleSearchManager
     */
    public function __construct(
        RequestMapper $requestMapper,
        TeacherScheduleSearchManager $teacherScheduleSearchManager
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
