<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Domain\TeacherSchedule\Search\TeacherScheduleSearchManager;
use App\Http\RequestData\TeachersGetRequestData;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeacherSearchController
 *
 * @package App\Http\Controller
 */
class TeacherSearchController
{
    /**
     * @var TeacherScheduleSearchManager
     */
    private $teacherScheduleSearchManager;

    /**
     * TeacherController constructor.
     *
     * @param TeacherScheduleSearchManager $teacherScheduleSearchManager
     */
    public function __construct(TeacherScheduleSearchManager $teacherScheduleSearchManager)
    {
        $this->teacherScheduleSearchManager = $teacherScheduleSearchManager;
    }

    /**
     * @Route(methods={"GET"}, path="/teacher-search")
     * @param TeachersGetRequestData $payload
     *
     * @return JsonResponse
     */
    public function __invoke(TeachersGetRequestData $payload): JsonResponse
    {
        return JsonResponse::create(
            $this->teacherScheduleSearchManager->find($payload)
        );
    }
}
