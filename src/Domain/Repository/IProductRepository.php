<?php

namespace App\Domain\Repository;

interface IProductRepository
{
    public function activeList() : array;
}