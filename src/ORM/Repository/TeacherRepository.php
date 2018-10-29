<?php
declare(strict_types = 1);

namespace App\ORM\Repository;

use App\ORM\Collection\TeacherCollection;
use App\ORM\Exception\TeacherNotFoundException;
use App\ORM\Model\Teacher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @param int $id
     *
     * @return Teacher|null|Model
     */
    public function findById(int $id): ?Teacher
    {
        return $this->teacher->newQuery()->where('teacher_id', '=', $id)->first();
    }

    /**
     * @param int $id
     *
     * @return Teacher
     * @throws TeacherNotFoundException
     */
    public function getById(int $id): Teacher
    {
        $model = $this->findById($id);
        if ($model === null) {
            throw new TeacherNotFoundException("Teacher with $id id not found.");
        }

        return $model;
    }
}
