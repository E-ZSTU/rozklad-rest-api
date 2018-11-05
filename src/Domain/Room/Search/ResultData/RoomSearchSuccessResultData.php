<?php
declare(strict_types = 1);

namespace App\Domain\Room\Search\ResultData;

use App\ORM\Model\Room;

/**
 * Class RoomSearchSuccessResultData
 *
 * @package App\Domain\Room\Search\ResultData
 */
class RoomSearchSuccessResultData extends AbstractRoomSearchResultData
{
    /**
     * @var Room
     */
    private $room;

    /**
     * RoomSearchSuccessResultData constructor.
     *
     * @param Room $room
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * @return Room
     */
    public function searched(): Room
    {
        return $this->room;
    }
}
