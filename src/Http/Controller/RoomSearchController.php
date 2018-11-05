<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Domain\Room\Search\RoomSearchManager;
use App\Framework\RequestMapper\RequestMapper;
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
     * @var RequestMapper
     */
    private $requestMapper;

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
     * @param RequestMapper     $requestMapper
     * @param FractalManager    $fractalManager
     * @param RoomSearchManager $roomSearchManager
     */
    public function __construct(
        RequestMapper $requestMapper,
        FractalManager $fractalManager,
        RoomSearchManager $roomSearchManager
    ) {
        $this->requestMapper = $requestMapper;
        $this->fractalManager = $fractalManager;
        $this->roomSearchManager = $roomSearchManager;
    }

    /**
     * @throws \App\Framework\RequestMapper\RequestMapperException
     */
    public function __invoke()
    {
        /** @var RoomSearchRequestData $payload */
        $payload = $this->requestMapper->map(RoomSearchRequestData::class);

        $result = $this->roomSearchManager->find($payload);

        return JsonResponse::create(
            $this->fractalManager->createData(new Item($result, new RoomSearchTransformer()))->toArray()
        );
    }
}
