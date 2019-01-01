<?php
declare(strict_types = 1);

namespace App\Http\RequestData;

use App\Domain\Teacher\Search\TeacherSearchCriteriaInterface;
use Maksi\LaravelRequestMapper\Filling\RequestData\RequestData;
use Maksi\LaravelRequestMapper\Validation\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TeacherSearchRequestData
 *
 * @Type(type="annotation")
 * @package App\Http\RequestData
 */
final class TeacherSearchRequestData extends RequestData implements TeacherSearchCriteriaInterface
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    private $name;

    /**
     * @param array $data
     */
    protected function init(array $data): void
    {
        $this->name = $data['name'] ?? null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}