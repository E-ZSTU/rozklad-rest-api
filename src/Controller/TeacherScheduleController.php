<?php
declare(strict_types = 1);

namespace App\Controller;

use App\RequestData\TeacherScheduleRequestGetData;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeacherScheduleController
 *
 * @package App\Controller
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
