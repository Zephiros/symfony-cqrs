<?php

namespace App\Kernel\Domain;

use DateTime;

interface ISimplyAuditableEntity
{
    public function getCreatedAt(): ?DateTime;

    public function setCreatedAt() : IEntity;
}
