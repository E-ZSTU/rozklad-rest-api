<?php
declare(strict_types = 1);

namespace App\Http\Transformer;

use App\ORM\Model\Room;
use League\Fractal\TransformerAbstract;

/**
 * Class TeacherTransformer
 *
 * @package App\Http\Transformer
 */
class RoomTransformer extends TransformerAbstract
{
    /**
     * @param Room $room
     *
     * @return array
     */
    public function transform(Room $room): array
    {
        return [
            'id' => $room->room_id,
            'room_name' => $room->room_name,
        ];
    }
}
