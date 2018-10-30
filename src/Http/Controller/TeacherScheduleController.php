<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Http\Transformer\TeacherSchedule\TeacherScheduleTransformer;
use App\ORM\Model\Teacher;
use Illuminate\Http\JsonResponse;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Item;

/**
 * Class TeacherScheduleController
 *
 * @package App\Http\Controller
 */
class TeacherScheduleController
{
    /**
     * @var FractalManager
     */
    private $fractalManager;

    /**
     * TeacherScheduleController constructor.
     *
     * @param FractalManager $fractalManager
     */
    public function __construct(FractalManager $fractalManager)
    {
        $this->fractalManager = $fractalManager;
    }

    /**
     * @param Teacher $teacher
     *
     * @return JsonResponse
     */
    public function __invoke(Teacher $teacher): JsonResponse
    {
        return JsonResponse::create(
            $this->fractalManager->createData(new Item($teacher, new TeacherScheduleTransformer()))->toArray()
        );
    }
}
