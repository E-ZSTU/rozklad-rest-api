<?php
declare(strict_types = 1);

namespace App\Http\RequestData;

use App\Framework\RequestTransformer\RequestDataInterface;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TeacherScheduleGetRequestData
 *
 * @package App\Http\RequestData
 */
final class TeacherScheduleGetRequestData implements RequestDataInterface, JsonSerializable
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

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
