<?php

namespace App\Infra\DataFixtures;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function __construct(private readonly UserRepository $userRepository) {}

    public function list(): array
    {
        return [
            new User("Admin", "admin@symfony-cqrs.com", "admin", "admin")
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $users = $this->list();

        foreach ($users as $user) {
            if ($this->userRepository->findOneBy(["email" => $user->getEmail()])) continue;

            $manager->persist($user);
        }

        $manager->flush();
    }
}
