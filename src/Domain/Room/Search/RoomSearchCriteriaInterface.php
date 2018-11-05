<?php
declare(strict_types = 1);

namespace App\Domain\Room\Search;

/**
 * Interface RoomSearchCriteriaInterface
 *
 * @package App\Domain\Room\Search
 */
interface RoomSearchCriteriaInterface
{
    /**
     * Get room name.
     *
     * @return string
     */
    public function getName(): string;
}
