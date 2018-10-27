<?php
declare(strict_types = 1);

namespace App\Http\RequestData;

use App\Domain\Teacher\Search\TeacherScheduleSearchCriteriaInterface;
use App\Framework\RequestTransformer\RequestDataInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TeachersGetRequestData
 *
 * @package App\Http\RequestData
 */
final class TeachersGetRequestData implements RequestDataInterface, TeacherScheduleSearchCriteriaInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    private $name;

    /**
     * TeacherScheduleRequestGetData constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->name = $request->get('name');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
