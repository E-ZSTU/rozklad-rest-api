<?php
declare(strict_types = 1);

namespace App\Domain\TeacherSchedule\Search;

/**
 * Interface TeacherScheduleSearchCriteriaInterface
 *
 * @package App\Domain\TeacherSchedule\Search
 */
interface TeacherScheduleSearchCriteriaInterface
{
    /**
     * Get teacher name.
     *
     * @return string
     */
    public function getName(): string;
}
