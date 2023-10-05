<?php

namespace App\Application\Query\GetProducts;

use App\Kernel\Application\IQueryResult;

final class GetProductsQueryResult implements IQueryResult
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addItem(GetProductsQueryResultItem $item) : void
    {
        $this->items[] = $item;
    }

    public function getItems() : array
    {
        return $this->items;
    }
}

final class GetProductsQueryResultItem
{
    private readonly int $id;

    private readonly string $name;

    private readonly string $code;

    public function __construct(int $id, string $name, string $code)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->code;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}