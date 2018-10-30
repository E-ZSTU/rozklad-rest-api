<?php
declare(strict_types = 1);

namespace App\ORM\Model;

use App\ORM\Collection\TeacherCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Teacher
 *
 * @property string|null $teacher_name
 * @property int|null $teacher_id
 *
 * @package App\ORM\Model
 */
class Teacher extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'teacher_id';

    /**
     * @param array $models
     *
     * @return TeacherCollection
     */
    public function newCollection(array $models = []): TeacherCollection
    {
        return new TeacherCollection($models);
    }

    /**
     * @return HasMany
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'activity_teacher_id', 'teacher_id');
    }

    /**
     * @return Collection
     */
    public function getActivities(): Collection
    {
        return $this->getRelationValue('activities');
    }
}
