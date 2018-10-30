<?php
declare(strict_types = 1);

namespace App\Http\Transformer\Schedule;

use App\ORM\Model\Room;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Class RoomScheduleTransformer
 *
 * @package App\Http\Transformer\Schedule
 */
class RoomScheduleTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['activities'];

    /**
     * @param Room $room
     *
     * @return array
     */
    public function transform(Room $room): array
    {
        return [
            'room_id' => $room->room_id,
            'room_name' => $room->room_name,
        ];
    }

    /**
     * @param Room $room
     *
     * @return Collection
     */
    public function includeActivities(Room $room): Collection
    {
        $room->load([
            'activities.day',
            'activities.hour',
            'activities.room',
            'activities.tag',
            'activities.subgroup',
            'activities.subject',
        ]);
        $activities = $room->getActivities()->groupBy(['day.day_name', 'hour.hour_name']);

        $newCollection = new \Illuminate\Database\Eloquent\Collection();
        $activities->each(function (\Illuminate\Database\Eloquent\Collection $collection) use ($newCollection) {
            $collection->each(function ($collection) use ($newCollection) {
                $newCollection->add($collection);
            });
        });

        return $this->collection($newCollection, new ActivityTransformer());
    }
}
