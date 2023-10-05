<?php

namespace App\API\Controller;

use App\Kernel\API\ApiResponse;
use App\Kernel\API\BaseController;
use App\Kernel\Application\IQueryBus;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

use App\Application\Query\GetProducts\GetProductsQueryInput;
use App\Application\Query\GetProductById\GetProductByIdQueryInput;

/**
 * @Route("/products", name="products")
 * @OA\Tag(name="Products")
 */
final class ProductController extends BaseController
{
    public function __construct(
        private readonly IQueryBus $queryBus
    ) { parent::__construct(); }

    /**
     * @Route("/", methods={"GET"}, name="products_list")
     */
    public function List() : ApiResponse
    {
        $query = new GetProductsQueryInput();
        $result = $this->queryBus->ask($query);

        return $this->HandleResult($result);
    }

    /**
     * @Route("/{id}/", methods={"GET"}, name="products_get")
     */
    public function Get(string $id) : ApiResponse
    {
        $query = new GetProductByIdQueryInput($id);
        $result = $this->queryBus->ask($query);

        return $this->HandleResult($result);
    }
}