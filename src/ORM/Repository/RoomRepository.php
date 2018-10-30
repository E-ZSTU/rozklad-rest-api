<?php
declare(strict_types = 1);

namespace App\ORM\Repository;

use App\ORM\Collection\TeacherCollection;
use App\ORM\Exception\RoomNotFoundException;
use App\ORM\Exception\TeacherNotFoundException;
use App\ORM\Model\Room;
use App\ORM\Model\Teacher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomRepository
 *
 * @package App\ORM\Repository
 */
class RoomRepository
{
    /**
     * @var Room
     */
    private $room;

    /**
     * RoomRepository constructor.
     *
     * @param Room $room
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * @param int $id
     *
     * @return Teacher|null|Model
     */
    public function findById(int $id): ?Room
    {
        return $this->room->newQuery()->where('room_id', '=', $id)->first();
    }

    /**
     * @param int $id
     *
     * @return Room
     * @throws RoomNotFoundException
     */
    public function getById(int $id): Room
    {
        $model = $this->findById($id);
        if ($model === null) {
            throw new RoomNotFoundException("Room with $id id not found.");
        }

        return $model;
    }
}
