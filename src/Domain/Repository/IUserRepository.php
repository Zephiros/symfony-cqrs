<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;

interface IUserRepository
{
    public function add(User $entity, bool $flush = false) : void;

    public function list() : array;

    public function get(int $id) : ?User;
}