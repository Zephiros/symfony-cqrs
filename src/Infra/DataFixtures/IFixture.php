<?php

namespace App\Infra\DataFixtures;

use Doctrine\Persistence\ObjectManager;
interface IFixture
{
    public function list(): array;

    public function load(ObjectManager $manager): void;
}