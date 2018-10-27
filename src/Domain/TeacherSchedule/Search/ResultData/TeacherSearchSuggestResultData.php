<?php
declare(strict_types = 1);

namespace App\Domain\TeacherSchedule\Search\ResultData;

/**
 * Class TeacherSearchSuggestResultData
 *
 * @package App\Domain\TeacherSchedule\Search\ResultData
 */
final class TeacherSearchSuggestResultData extends AbstractTeacherSearchResultData
{
    /**
     * @var array
     */
    private $data;

    /**
     * TeacherSearchSuggestResultData constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function suggest(): array
    {
        return $this->data;
    }
}
