<?php
declare(strict_types = 1);

namespace App\Domain\TeacherSchedule\Search;

use App\Domain\TeacherSchedule\Search\ResultData\AbstractTeacherSearchResultData;
use App\Domain\TeacherSchedule\Search\ResultData\TeacherSearchSuccessResultData;
use App\Domain\TeacherSchedule\Search\ResultData\TeacherSearchSuggestResultData;
use App\ORM\Repository\TeacherRepository;

/**
 * Class TeacherScheduleSearchManager
 *
 * @package App\Domain\TeacherSchedule\Search
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
        $teacher = $this->teacherRepository->findAllByTeacherName($criteria->getName());

        if (\count($teacher) > 0 && $teacher[0]->getTeacherName() === $criteria->getName()) {
            return new TeacherSearchSuccessResultData($teacher[0]);
        }

        return new TeacherSearchSuggestResultData($teacher);
    }
}
