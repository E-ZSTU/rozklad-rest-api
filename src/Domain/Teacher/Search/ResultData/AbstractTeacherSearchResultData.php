<?php
declare(strict_types = 1);

namespace App\Domain\Teacher\Search\ResultData;

use App\ORM\Collection\TeacherCollection;
use App\ORM\Model\Teacher;
use JsonSerializable;

/**
 * Class AbstractTeacherSearchResultData
 *
 * @package App\Domain\Teacher\Search\ResultData
 */
abstract class AbstractTeacherSearchResultData implements JsonSerializable
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

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    final public function jsonSerialize(): array
    {
        return [
            'searched' => $this->searched(),
            'suggest' => $this->suggest(),
        ];
    }
}
