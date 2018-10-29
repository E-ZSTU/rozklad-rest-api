<?php
declare(strict_types = 1);

namespace App\ORM\Collection;

use App\ORM\Model\Teacher;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TeacherCollection
 *
 * @package App\ORM\Collection
 */
class TeacherCollection extends Collection
{
    /**
     * @param callable|null $callback
     * @param null          $default
     *
     * @return Teacher|null
     */
    public function first(callable $callback = null, $default = null): ?Teacher
    {
        return parent::first($callback, $default);
    }
}
