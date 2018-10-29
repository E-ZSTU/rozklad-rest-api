<?php
declare(strict_types = 1);

namespace App\Http\Resource;

use App\ORM\Model\Activity;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class ActivityResource
 *
 * @property-read Activity $resource
 *
 * @package App\Http\Resource
 */
class ActivityResource extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'day' => $this->resource->getDat(),
            'hour' => $this->resource->getHour(),
            'room' => $this->resource->getRoom(),
            'tag'=> $this->resource->getTag(),
            'subject' => $this->resource->getSubject(),
            'subgroup' => $this->resource->getSubgroup(),
        ];
    }
}
