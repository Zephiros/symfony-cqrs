<?php

namespace App\Application\Query\GetCountries;

use App\Domain\Repository\ICountryRepository;
use App\Kernel\Application\IQueryHandler;

final class GetCountriesQueryHandler implements IQueryHandler
{
    public function __construct(
        private readonly ICountryRepository $countryRepository
    ) {}

    public function __invoke(GetCountriesQueryInput $query) : ?GetCountriesQueryResult
    {
        $result = new GetCountriesQueryResult();

        foreach ($this->countryRepository->list() as $country) {
            $resultItem = new GetCountriesQueryResultItem($country->getId(), $country->getCode());
            $result->addItem($resultItem);
        }

        return $result;
    }
}