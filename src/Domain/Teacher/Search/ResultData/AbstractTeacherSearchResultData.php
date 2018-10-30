<?php
declare(strict_types = 1);

namespace App\Domain\Teacher\Search\ResultData;

use App\ORM\Collection\TeacherCollection;
use App\ORM\Model\Teacher;

/**
 * Class AbstractTeacherSearchResultData
 *
 * @package App\Domain\Teacher\Search\ResultData
 */
abstract class AbstractTeacherSearchResultData
{
    /**
     * @return Teacher|null
     */
    public function searched(): ?Teacher
    {
        return null;
    }

    /**
     * @return TeacherCollection
     */
    public function suggest(): TeacherCollection
    {
        return new TeacherCollection();
    }
}
