<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;

interface IUserRepository
{
    public function add(User $entity, bool $flush = false) : void;
}