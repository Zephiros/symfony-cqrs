<?php

namespace App\Kernel\Domain;

use Doctrine\ORM\Mapping as ORM;

class Entity implements IEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected int $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}