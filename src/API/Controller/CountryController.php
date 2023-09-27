<?php

namespace App\API\Controller;

use App\Kernel\API\ApiResponse;
use App\Kernel\API\BaseController;
use App\Kernel\Application\IQueryBus;
use Symfony\Component\Routing\Annotation\Route;

use App\Application\Query\GetCountries\GetCountriesQueryInput;

/**
 * @Route("/countries", name="countries")
 */
final class CountryController extends BaseController
{
    public function __construct(
        private readonly IQueryBus $queryBus
    ) { parent::__construct(); }

    /**
     * @Route("/", methods={"GET"}, name="countries_list")
     */
    public function List() : ApiResponse
    {
        $query = new GetCountriesQueryInput();
        $result = $this->queryBus->ask($query);

        return $this->HandleResult($result);
    }
}