<?php
declare(strict_types = 1);

namespace App\Http\Transformer;

use App\ORM\Model\Teacher;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Class TeacherScheduleTransformer
 *
 * @package App\Http\Transformer
 */
class TeacherScheduleTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['activities'];

    /**
     * @param Teacher $teacher
     *
     * @return array
     */
    public function transform(Teacher $teacher): array
    {
        return [
            'teacher_name' => $teacher->teacher_name,
            'teacher_id' => $teacher->teacher_id,
        ];
    }

    /**
     * @param Teacher $teacher
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeActivities(Teacher $teacher): Collection
    {
        $teacher->load([
            'activities.day',
            'activities.hour',
            'activities.room',
            'activities.tag',
            'activities.subgroup',
            'activities.subject',
        ]);
        $activities = $teacher->getActivities()->groupBy(['day.day_name', 'hour.hour_name']);

        $newCollection = new \Illuminate\Database\Eloquent\Collection();
        $activities->each(function (\Illuminate\Database\Eloquent\Collection $collection) use ($newCollection) {
            $collection->each(function ($collection) use ($newCollection) {
                $newCollection->add($collection);
            });
        });

        return $this->collection($newCollection, new ActivityTransformer());
    }
}
