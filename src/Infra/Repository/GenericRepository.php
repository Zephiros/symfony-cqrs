<?php

namespace App\Infra\Repository;

use App\Kernel\Domain\Entity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

abstract class GenericRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);
    }

    public function list() : array
    {
        return $this->findAll();
    }

    public function get(int $id) : ?Entity
    {
        return $this->find($id);
    }
}
