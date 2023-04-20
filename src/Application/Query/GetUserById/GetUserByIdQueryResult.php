<?php

namespace App\Application\Query\GetUserById;

use App\Kernel\Application\IQueryResult;

final class GetUserByIdQueryResult implements IQueryResult
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