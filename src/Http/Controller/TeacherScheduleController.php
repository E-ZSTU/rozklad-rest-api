<?php
declare(strict_types = 1);

namespace App\Http\Controller;

use App\Http\Resource\TeacherScheduleResource;
use App\ORM\Model\Teacher;

/**
 * Class TeacherScheduleController
 *
 * @package App\Http\Controller
 */
class TeacherScheduleController
{
    /**
     * @param Teacher $teacher
     *
     * @return TeacherScheduleResource
     */
    public function __invoke(Teacher $teacher)
    {
        return new TeacherScheduleResource($teacher);
    }
}
