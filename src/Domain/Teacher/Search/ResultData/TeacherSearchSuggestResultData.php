<?php
declare(strict_types = 1);

namespace App\Domain\Teacher\Search\ResultData;

use App\ORM\Collection\TeacherCollection;

/**
 * Class TeacherSearchSuggestResultData
 *
 * @package App\Domain\Teacher\Search\ResultData
 */
final class TeacherSearchSuggestResultData extends AbstractTeacherSearchResultData
{
    /**
     * @var TeacherCollection
     */
    private $data;

    /**
     * TeacherSearchSuggestResultData constructor.
     *
     * @param TeacherCollection $data
     */
    public function __construct(TeacherCollection $data)
    {
        $this->data = $data;
    }

    /**
     * @return TeacherCollection
     */
    public function suggest(): TeacherCollection
    {
        return $this->data;
    }
}
