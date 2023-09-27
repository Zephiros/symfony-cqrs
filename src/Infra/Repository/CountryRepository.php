<?php

namespace App\Infra\Repository;

use App\Domain\Entity\Country;
use App\Domain\Repository\ICountryRepository;
use Doctrine\Persistence\ManagerRegistry;

class CountryRepository extends GenericRepository implements ICountryRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Country::class);
    }
}
