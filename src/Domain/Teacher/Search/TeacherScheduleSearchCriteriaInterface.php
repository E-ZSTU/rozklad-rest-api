<?php
declare(strict_types = 1);

namespace App\Domain\Teacher\Search;

/**
 * Interface TeacherScheduleSearchCriteriaInterface
 *
 * @package App\Domain\Teacher\Search
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
