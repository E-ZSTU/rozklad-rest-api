<?php
declare(strict_types = 1);

namespace App\ORM\Collection;

use App\ORM\Model\Room;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RoomCollection
 *
 * @package App\ORM\Collection
 */
class RoomCollection extends Collection
{
    /**
     * @param callable|null $callback
     * @param null          $default
     *
     * @return Room|null
     */
    public function first(callable $callback = null, $default = null): ?Room
    {
        return parent::first($callback, $default);
    }

    /**
     * @param string $name
     *
     * @return Room|null
     */
    public function firstByName(string $name): ?Room
    {
        return $this->first(function (Room $room) use ($name) {
            return $room->room_name === $name;
        });
    }
}
