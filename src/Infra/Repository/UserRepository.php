<?php

namespace App\Infra\Repository;

use App\Domain\Entity\User;
use App\Domain\Repository\IUserRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends GenericRepository implements IUserRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $entity, bool $flush = false) : void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
