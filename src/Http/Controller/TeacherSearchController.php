<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Domain\Teacher\Search\TeacherSearchManager;
use App\Http\RequestData\TeacherSearchRequestData;
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
     * @param FractalManager       $fractalManager
     * @param TeacherSearchManager $teacherScheduleSearchManager
     */
    public function __construct(FractalManager $fractalManager, TeacherSearchManager $teacherScheduleSearchManager)
    {
        $this->fractalManager = $fractalManager;
        $this->teacherScheduleSearchManager = $teacherScheduleSearchManager;
    }

    /**
     * @param TeacherSearchRequestData $payload
     *
     * @return JsonResponse
     */
    public function __invoke(TeacherSearchRequestData $payload): JsonResponse
    {
        $teacherSearchResult = $this->teacherScheduleSearchManager->find($payload);

        return JsonResponse::create(
            $this->fractalManager->createData(new Item($teacherSearchResult, new TeacherSearchTransformer()))->toArray()
        );
    }
}
