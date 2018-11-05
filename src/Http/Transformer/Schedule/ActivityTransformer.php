<?php
declare(strict_types = 1);

namespace App\Http\Transformer\Schedule;

use App\ORM\Model\Activity;
use Illuminate\Support\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Class ActivityTransformer
 *
 * @package App\Http\Transformer\Schedule
 */
class ActivityTransformer extends TransformerAbstract
{
    /**
     * @param Collection $collection
     *
     * @return array
     */
    public function transform(Collection $collection): array
    {
        /** @var Activity $activity */
        $activity = $collection->first();

        $groupNames = implode(',', $collection->map(function (Activity $activity) {
            $subgroupName = $activity->getSubgroup()->subgroup_name;

            if ($activity->getTag()->activity_tag_name === 'Лекція'
                && $subgroupSeparator = strpos($subgroupName, '[')) {
                return substr($subgroupName, 0, $subgroupSeparator);
            }

            return $subgroupName;
        })->unique()->toArray());

        return [
            'hour_name' => $activity->getHour()->hour_name,
            'hour_id' => $activity->getHour()->hour_id,
            'groups' => $groupNames,
            'room' => $activity->getRoom()->room_name,
            'tag' => $activity->getTag()->activity_tag_name,
            'day' => $activity->getDay()->day_name,
            'teacher_name' => $activity->getTeacher()->teacher_name,
            'subject_name' => $activity->getSubject()->subject_name,
        ];
    }
}
