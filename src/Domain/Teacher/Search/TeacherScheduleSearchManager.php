<?php
declare(strict_types = 1);

namespace App\Domain\Teacher\Search;

use App\Domain\Teacher\Search\ResultData\AbstractTeacherSearchResultData;
use App\Domain\Teacher\Search\ResultData\TeacherSearchSuccessResultData;
use App\Domain\Teacher\Search\ResultData\TeacherSearchSuggestResultData;
use App\ORM\Repository\TeacherRepository;

/**
 * Class TeacherScheduleSearchManager
 *
 * @package App\Domain\Teacher\Search
 */
class TeacherScheduleSearchManager
{
    /**
     * @var TeacherRepository
     */
    private $teacherRepository;

    /**
     * TeacherScheduleSearchManager constructor.
     *
     * @param TeacherRepository $teacherRepository
     */
    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    /**
     * @param TeacherScheduleSearchCriteriaInterface $criteria
     *
     * @return AbstractTeacherSearchResultData
     */
    public function find(TeacherScheduleSearchCriteriaInterface $criteria): AbstractTeacherSearchResultData
    {
        $teachers = $this->teacherRepository->findAllByTeacherName($criteria->getName());

        $firstTeacher = $teachers->first();

        if ($firstTeacher && $firstTeacher->teacher_name === $criteria->getName()) {
            return new TeacherSearchSuccessResultData($firstTeacher);
        }

        return new TeacherSearchSuggestResultData($teachers);
    }
}
