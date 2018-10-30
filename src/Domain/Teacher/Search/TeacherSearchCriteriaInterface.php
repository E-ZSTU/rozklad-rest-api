<?php
declare(strict_types = 1);

namespace App\Domain\Teacher\Search;

/**
 * Interface TeacherSearchCriteriaInterface
 *
 * @package App\Domain\Teacher\Search
 */
interface TeacherSearchCriteriaInterface
{
    /**
     * Get teacher name.
     *
     * @return string
     */
    public function getName(): string;
}
