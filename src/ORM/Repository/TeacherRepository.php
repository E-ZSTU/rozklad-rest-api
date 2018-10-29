<?php
declare(strict_types = 1);

namespace App\ORM\Repository;

use App\ORM\Collection\TeacherCollection;
use App\ORM\Model\Teacher;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TeacherRepository
 *
 * @package App\ORM\Repository
 */
class TeacherRepository
{
    /**
     * @var Teacher
     */
    private $teacher;

    /**
     * TeacherRepository constructor.
     *
     * @param Teacher $teacher
     */
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * @param string $name
     *
     * @return Collection|TeacherCollection|Teacher[]
     */
    public function findAllByTeacherName(string $name): TeacherCollection
    {
        return $this->teacher->newQuery()->where('teacher_name', 'like', "%$name%")->get();
    }
}
