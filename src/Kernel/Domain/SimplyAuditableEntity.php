<?php

namespace App\Kernel\Domain;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

class SimplyAuditableEntity extends Entity implements ISimplyAuditableEntity
{
    #[ORM\Column(name: 'created_at', type: 'datetime')]
    protected DateTime $createdAt;

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt() : IEntity
    {
        $this->createdAt = new DateTime();

        return $this;
    }
}