<?php

namespace App\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="App\ORM\Repository\TeacherRepository")
 * @ORM\Table(name="teachers")
 */
class Teacher implements JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="teacher_id")
     */
    private $id;

    /**
     * @ORM\Column(type="text", name="teacher_name")
     */
    private $teacher_name;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTeacherName(): ?string
    {
        return $this->teacher_name;
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
        $name = $this->getTeacherName();

        return [
            'id' => $this->getId(),
            'teacher_name' => $name,
        ];
    }
}
