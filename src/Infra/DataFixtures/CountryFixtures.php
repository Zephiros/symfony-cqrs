<?php

namespace App\Infra\DataFixtures;

use App\Domain\Entity\Country;
use App\Infra\Repository\CountryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function __construct(
        private readonly CountryRepository $userRepository
    ) {}

    public function list(): array
    {
        return [
            new Country("BR"),
            new Country("AR")
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $countries = $this->list();

        foreach ($countries as $country) {
            if (!$this->userRepository->findOneBy(["code" => $country->getCode()]))
                $manager->persist($country);
        }

        $manager->flush();
    }
}
