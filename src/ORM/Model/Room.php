<?php
declare(strict_types = 1);

namespace App\ORM\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Hour
 *
 * @property int $room_id
 * @property string $room_name
 *
 * @package App\ORM\Model
 */
class Room extends Model
{
    /**
     * @return HasMany
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'activity_room_id', 'room_id');
    }

    /**
     * @return Collection
     */
    public function getActivities(): Collection
    {
        return $this->getRelationValue('activities');
    }
}
