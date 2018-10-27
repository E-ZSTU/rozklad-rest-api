<?php

namespace App\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\ORM\Repository\TeacherRepository")
 * @ORM\Table(name="teachers")
 */
class Teacher
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer",name="teacher_id")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
