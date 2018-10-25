<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Http\RequestData\TeacherScheduleRequestGetData;
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
     * @param TeacherScheduleRequestGetData $request
     *
     * @return JsonResponse
     */
    public function getScheduleAction(TeacherScheduleRequestGetData $request):JsonResponse
    {
        return JsonResponse::create($request);
    }
}
