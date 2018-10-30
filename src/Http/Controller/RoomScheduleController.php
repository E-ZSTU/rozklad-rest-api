<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Http\Transformer\Schedule\RoomScheduleTransformer;
use App\ORM\Model\Room;
use Illuminate\Http\JsonResponse;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Item;

/**
 * Class RoomScheduleController
 *
 * @package App\Http\Controller
 */
class RoomScheduleController
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
     * @param Room $room
     *
     * @return JsonResponse
     */
    public function __invoke(Room $room): JsonResponse
    {
        return JsonResponse::create(
            $this->fractalManager->createData(new Item($room, new RoomScheduleTransformer()))->toArray()
        );
    }
}
