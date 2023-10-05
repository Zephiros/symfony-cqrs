<?php

namespace App\Infra\Repository;

use App\Domain\Entity\Product;
use App\Domain\Repository\IProductRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductRepository extends GenericRepository implements IProductRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function activeList() : array
    {
        return $this->findBy(["isActive" => true]);
    }
}
