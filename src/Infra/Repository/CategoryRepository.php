<?php

namespace App\Infra\Repository;

use App\Domain\Entity\Category;
use App\Domain\Repository\ICategoryRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategoryRepository extends GenericRepository implements ICategoryRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }
}
