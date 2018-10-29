<?php
declare(strict_types = 1);

namespace App\ORM\Model;

use App\ORM\Collection\TeacherCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 *
 * @property string|null $teacher_name
 *
 * @package App\ORM\Model
 */
class Teacher extends Model
{
    /**
     * @param array $models
     *
     * @return TeacherCollection
     */
    public function newCollection(array $models = []): TeacherCollection
    {
        return new TeacherCollection($models);
    }
}
