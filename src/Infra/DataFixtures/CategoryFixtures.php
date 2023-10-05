<?php

namespace App\Infra\DataFixtures;

use App\Domain\Entity\Category;
use App\Infra\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    ) {}

    public function list(): array
    {
        return [
            new Category("Category A"),
            new Category("Category B")
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $categories = $this->list();

        foreach ($categories as $category) {
            if (!$this->categoryRepository->findOneBy(["name" => $category->getName()]))
                $manager->persist($category);
        }

        $manager->flush();
    }
}
