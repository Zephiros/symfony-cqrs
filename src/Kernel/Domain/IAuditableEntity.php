<?php

namespace App\Kernel\Domain;

use DateTime;

interface IAuditableEntity
{
    public function getUpdatedAt(): ?DateTime;

    public function setUpdatedAt() : IEntity;
}
