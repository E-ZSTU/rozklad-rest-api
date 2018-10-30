<?php
declare(strict_types = 1);

namespace App\Http\Transformer;

use App\ORM\Model\Teacher;
use League\Fractal\TransformerAbstract;

/**
 * Class TeacherTransformer
 *
 * @package App\Http\Transformer
 */
class TeacherTransformer extends TransformerAbstract
{
    /**
     * @param Teacher $teacher
     *
     * @return array
     */
    public function transform(Teacher $teacher): array
    {
        return [
            'id' => $teacher->teacher_id,
            'teacher_name' => $teacher->teacher_name,
        ];
    }
}
