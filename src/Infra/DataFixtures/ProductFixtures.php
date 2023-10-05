<?php

namespace App\Infra\DataFixtures;

use App\Domain\Entity\Product;
use App\Infra\Repository\CategoryRepository;
use App\Infra\Repository\ProductRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly ProductRepository $productRepository
    ) {}

    public function list(): array
    {
        $productA = new Product("Product A", 'Code 123', true);
        $productB = new Product("Product B", 'Code 456', true);

        if ($categoryA = $this->categoryRepository->findOneBy(["name" => "Category A"]))
            $productA->addCategory($categoryA);

        if ($categoryB = $this->categoryRepository->findOneBy(["name" => "Category B"]))
            $productB->addCategory($categoryB);

        return [
            $productA,
            $productB
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $products = $this->list();

        foreach ($products as $product) {
            if (!$this->productRepository->findOneBy(["code" => $product->getCode()]))
                $manager->persist($product);
        }

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            CategoryFixtures::class
        ];
    }
}
