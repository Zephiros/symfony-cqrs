<?php

namespace App\Kernel\Domain;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

class AuditableEntity extends SimplyAuditableEntity implements IAuditableEntity
{
    #[ORM\Column(name: 'updated_at', type: 'datetime', nullable: true)]
    protected ?DateTime $updatedAt;

    #[ORM\PrePersist]
    public function setCreatedAt(): IEntity
    {
        parent::setCreatedAt();
        $this->setUpdatedAt();

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    #[ORM\PreUpdate]
    public function setUpdatedAt(): IEntity
    {
        $this->updatedAt = new DateTime();

        return $this;
    }
}