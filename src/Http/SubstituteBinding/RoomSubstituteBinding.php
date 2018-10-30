<?php
declare(strict_types = 1);

namespace App\Http\SubstituteBinding;

use App\ORM\Exception\RoomNotFoundException;
use App\ORM\Model\Room;
use App\ORM\Repository\RoomRepository;

/**
 * Class RoomSubstituteBinding
 *
 * @package App\Http\SubstituteBinding
 */
class RoomSubstituteBinding
{
    /**
     * @var RoomRepository
     */
    private $roomRepository;

    /**
     * RoomSubstituteBinding constructor.
     *
     * @param RoomRepository $roomRepository
     */
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @param $value
     *
     * @return Room
     */
    public function bind($value): Room
    {
        try {
            return $this->roomRepository->getById((int) $value);
        } catch (RoomNotFoundException $exception) {
            throw new SubstituteBindingException($exception->getMessage());
        }
    }
}
