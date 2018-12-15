<?php
declare(strict_types = 1);

namespace App\Http\RequestData;

use App\Domain\Room\Search\RoomSearchCriteriaInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TeachersGetRequestData
 *
 * @package App\Http\RequestData
 */
final class RoomSearchRequestData implements RoomSearchCriteriaInterface
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    private $name;

    /**
     * RoomSearchRequestData constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
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