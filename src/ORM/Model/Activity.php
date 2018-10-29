<?php
declare(strict_types = 1);

namespace App\ORM\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Activity
 *
 * @package App\ORM\Model
 */
class Activity extends Model
{
    protected $table = 'activities';

    /**
     * @return BelongsTo
     */
    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class, 'activity_day_id', 'day_id');
    }

    /**
     * @return Day
     */
    public function getDat(): Day
    {
        return $this->getRelationValue('day');
    }

    /**
     * @return BelongsTo
     */
    public function hour(): BelongsTo
    {
        return $this->belongsTo(Hour::class, 'activity_hour_id', 'hour_id');
    }

    /**
     * @return Hour
     */
    public function getHour(): Hour
    {
        return $this->getRelationValue('hour');
    }

    /**
     * @return BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'activity_room_id', 'room_id');
    }

    /**
     * @return Room
     */
    public function getRoom(): Room
    {
        return $this->getRelationValue('room');
    }

    /**
     * @return BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'activity_subject_id', 'subject_id');
    }

    /**
     * @return Subject
     */
    public function getSubject(): Subject
    {
        return $this->getRelationValue('subject');
    }

    /**
     * @return BelongsTo
     */
    public function subgroup(): BelongsTo
    {
        return $this->belongsTo(Subgroup::class, 'activity_subgroup_id', 'subgroup_id');
    }

    /**
     * @return Subgroup
     */
    public function getSubgroup(): Subgroup
    {
        return $this->getRelationValue('subgroup');
    }

    /**
     * @return BelongsTo
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(ActivityTag::class, 'activity_tag_id', 'activity_tag_id');
    }

    /**
     * @return ActivityTag
     */
    public function getTag(): ActivityTag
    {
        return $this->getRelationValue('tag');
    }
}
