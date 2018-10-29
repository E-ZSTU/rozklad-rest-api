<?php
declare(strict_types = 1);

namespace App\Http\Resource;

use App\ORM\Model\Teacher;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class TeacherScheduleResource
 *
 * @property-read Teacher $resource
 *
 * @package App\Http\Resource
 */
class TeacherScheduleResource extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'schedule' => ActivityResource::collection($this->resource->getActivities()),
        ];
    }
}
