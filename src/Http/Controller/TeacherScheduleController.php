<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Http\RequestData\TeacherScheduleGetRequestData;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeacherScheduleController
 *
 * @package App\Http\Controller
 */
final class TeacherScheduleController
{
    /**
     * @Route(methods={"GET"}, path="/teacher")
     * @param TeacherScheduleGetRequestData $payload
     *
     * @return JsonResponse
     */
    public function getScheduleAction(TeacherScheduleGetRequestData $payload): JsonResponse
    {
        return JsonResponse::create($payload);
    }
}
