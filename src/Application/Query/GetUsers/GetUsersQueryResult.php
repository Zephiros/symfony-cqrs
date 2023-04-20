<?php

namespace App\Application\Query\GetUsers;

use App\Kernel\Application\IQueryResult;

final class GetUsersQueryResult implements IQueryResult
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addItem(GetUsersQueryResultItem $item) : void
    {
        $this->items[] = $item;
    }

    public function getItems() : array
    {
        return $this->items;
    }
}

final class GetUsersQueryResultItem
{
    private readonly int $id;
    private readonly string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}