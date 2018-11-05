<?php
declare(strict_types = 1);

namespace App\Domain\Room\Search;

use App\Domain\Room\Search\ResultData\AbstractRoomSearchResultData;
use App\Domain\Room\Search\ResultData\RoomSearchSuccessResultData;
use App\Domain\Room\Search\ResultData\RoomSearchSuggestResultData;
use App\ORM\Repository\RoomRepository;

/**
 * Class RoomSearchManager
 *
 * @package App\Domain\Room\Search
 */
class RoomSearchManager
{
    /**
     * @var RoomRepository
     */
    private $roomRepository;

    /**
     * RoomSearchManager constructor.
     *
     * @param RoomRepository $roomRepository
     */
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @param RoomSearchCriteriaInterface $criteria
     *
     * @return AbstractRoomSearchResultData
     */
    public function find(RoomSearchCriteriaInterface $criteria): AbstractRoomSearchResultData
    {
        $rooms = $this->roomRepository->findAllByRoomName($criteria->getName());

        if ($room = $rooms->firstByName($criteria->getName())) {
            return new RoomSearchSuccessResultData($room);
        }

        return new RoomSearchSuggestResultData($rooms);
    }
}
