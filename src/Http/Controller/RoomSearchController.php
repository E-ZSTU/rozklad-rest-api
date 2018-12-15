<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Domain\Room\Search\RoomSearchManager;
use App\Http\RequestData\RoomSearchRequestData;
use App\Http\Transformer\RoomSearch\RoomSearchTransformer;
use Illuminate\Http\JsonResponse;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Item;

/**
 * Class RoomSearchController
 *
 * @package App\Http\Controller
 */
class RoomSearchController
{
    /**
     * @var FractalManager
     */
    private $fractalManager;

    /**
     * @var RoomSearchManager
     */
    private $roomSearchManager;

    /**
     * RoomSearchController constructor.
     *
     * @param FractalManager    $fractalManager
     * @param RoomSearchManager $roomSearchManager
     */
    public function __construct(FractalManager $fractalManager, RoomSearchManager $roomSearchManager)
    {
        $this->fractalManager = $fractalManager;
        $this->roomSearchManager = $roomSearchManager;
    }

    /**
     * @param RoomSearchRequestData $payload
     *
     * @return JsonResponse
     */
    public function __invoke(RoomSearchRequestData $payload)
    {
        $result = $this->roomSearchManager->find($payload);

        return JsonResponse::create(
            $this->fractalManager->createData(new Item($result, new RoomSearchTransformer()))->toArray()
        );
    }
}
