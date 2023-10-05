<?php

namespace App\Application\Query\GetProductById;

use App\Kernel\Application\IQueryResult;

final class GetProductByIdQueryResult implements IQueryResult
{
    private readonly int $id;

    private readonly string $name;

    private readonly string $code;

    private readonly array $categories;

    public function __construct(string $id, string $name, string $code, array $categories)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->categories = $categories;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }
}

final class GetProductByIdQueryResultCategory
{
    private readonly int $id;

    private readonly string $name;

    public function __construct(string $id, string $name)
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