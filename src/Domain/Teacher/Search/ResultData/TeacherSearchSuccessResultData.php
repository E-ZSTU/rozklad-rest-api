<?php
declare(strict_types = 1);

namespace App\Domain\Teacher\Search\ResultData;

use App\ORM\Entity\Teacher;

/**
 * Class TeacherSearchSuccessResultData
 *
 * @package App\Domain\Teacher\Search\ResultData
 */
final class TeacherSearchSuccessResultData extends AbstractTeacherSearchResultData
{
    /**
     * @var Teacher
     */
    private $teacher;

    /**
     * TeacherSearchSuccessResultData constructor.
     *
     * @param Teacher $teacher
     */
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * @return Teacher|null
     */
    public function searched(): ?Teacher
    {
        return $this->teacher;
    }
}
