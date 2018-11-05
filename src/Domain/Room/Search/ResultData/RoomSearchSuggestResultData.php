<?php
declare(strict_types = 1);

namespace App\Domain\Room\Search\ResultData;

use App\ORM\Collection\RoomCollection;

/**
 * Class RoomSearchSuccessResultData
 *
 * @package App\Domain\Room\Search\ResultData
 */
class RoomSearchSuggestResultData extends AbstractRoomSearchResultData
{
    /**
     * @var RoomCollection
     */
    private $roomCollection;

    /**
     * RoomSearchSuggestResultData constructor.
     *
     * @param RoomCollection $roomCollection
     */
    public function __construct(RoomCollection $roomCollection)
    {
        $this->roomCollection = $roomCollection;
    }

    /**
     * @return RoomCollection
     */
    public function suggest(): RoomCollection
    {
        return $this->roomCollection;
    }
}
