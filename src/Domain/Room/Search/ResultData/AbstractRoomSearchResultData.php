<?php
declare(strict_types = 1);

namespace App\Domain\Room\Search\ResultData;

use App\ORM\Collection\RoomCollection;
use App\ORM\Model\Room;
use App\ORM\Model\Teacher;

/**
 * Class AbstractRoomSearchResultData
 *
 * @package App\Domain\Room\Search\ResultData
 */
abstract class AbstractRoomSearchResultData
{
    /**
     * @return Teacher|null
     */
    public function searched(): ?Room
    {
        return null;
    }

    /**
     * @return RoomCollection
     */
    public function suggest(): RoomCollection
    {
        return new RoomCollection();
    }
}
