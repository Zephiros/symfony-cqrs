<?php

namespace App\Application\Query\GetProducts;

use App\Domain\Repository\IProductRepository;
use App\Kernel\Application\IQueryHandler;

final class GetProductsQueryHandler implements IQueryHandler
{
    public function __construct(
        private readonly IProductRepository $productRepository
    ) {}

    public function __invoke(GetProductsQueryInput $query) : ?GetProductsQueryResult
    {
        $result = new GetProductsQueryResult();

        foreach ($this->productRepository->activeList() as $product) {
            $resultItem = new GetProductsQueryResultItem($product->getId(), $product->getName(), $product->getCode());
            $result->addItem($resultItem);
        }

        return $result;
    }
}