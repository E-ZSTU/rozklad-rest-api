<?php
declare(strict_types = 1);

namespace App\Http\SubstituteBinding;

use App\ORM\Exception\TeacherNotFoundException;
use App\ORM\Model\Teacher;
use App\ORM\Repository\TeacherRepository;

/**
 * Class TeacherSubstituteBinding
 *
 * @package App\Http\SubstituteBinding
 */
class TeacherSubstituteBinding
{
    /**
     * @var TeacherRepository
     */
    private $teacherRepository;

    /**
     * TeacherSubstituteBinding constructor.
     *
     * @param TeacherRepository $teacherRepository
     */
    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    /**
     * @param $value
     *
     * @return Teacher
     */
    public function bind($value): Teacher
    {
        try {
            return $this->teacherRepository->getById((int) $value);
        } catch (TeacherNotFoundException $exception) {
            throw new SubstituteBindingException($exception->getMessage());
        }
    }
}
