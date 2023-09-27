<?php

namespace App\Application\Query\GetCountries;

use App\Kernel\Application\IQueryResult;

final class GetCountriesQueryResult implements IQueryResult
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addItem(GetCountriesQueryResultItem $item) : void
    {
        $this->items[] = $item;
    }

    public function getItems() : array
    {
        return $this->items;
    }
}

final class GetCountriesQueryResultItem
{
    private readonly int $id;
    private readonly string $code;

    public function __construct(int $id, string $code)
    {
        $this->id = $id;
        $this->code = $code;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}