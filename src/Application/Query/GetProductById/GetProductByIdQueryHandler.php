<?php

namespace App\Application\Query\GetProductById;

use App\Domain\Repository\IProductRepository;
use App\Kernel\Application\IQueryHandler;
use InvalidArgumentException;

final class GetProductByIdQueryHandler implements IQueryHandler
{
    public function __construct(
        private readonly IProductRepository $productRepository
    ) {}

    public function __invoke(GetProductByIdQueryInput $query) : ?GetProductByIdQueryResult
    {
        $product = $this->productRepository->get($query->getId());

        if ($product === null) {
            throw new InvalidArgumentException('Product not found');
        }

        $categories = array_map(fn($category) => new GetProductByIdQueryResultCategory(
            $category->getId(),
            $category->getName()
        ), $product->getCategories()->toArray());

        return new GetProductByIdQueryResult($product->getId(), $product->getName(), $product->getCode(), $categories);
    }
}