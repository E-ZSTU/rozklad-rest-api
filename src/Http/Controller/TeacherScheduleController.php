<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Http\RequestData\TeacherScheduleGetRequestData;
use App\ORM\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeacherScheduleController
 *
 * @package App\Http\Controller
 */
final class TeacherScheduleController extends AbstractController
{
    /**
     * @Route(methods={"GET"}, path="/teacher")
     * @param TeacherScheduleGetRequestData $payload
     *
     * @return JsonResponse
     */
    public function getScheduleAction(TeacherScheduleGetRequestData $payload): JsonResponse
    {
        $product = $this->getDoctrine()
            ->getRepository(Teacher::class)
            ->find(1);
        return JsonResponse::create([1=> $product->getId()]);
    }
}
