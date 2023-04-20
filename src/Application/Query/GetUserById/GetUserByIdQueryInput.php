<?php

namespace App\Application\Query\GetUserById;

use App\Kernel\Application\IQuery;

final class GetUserByIdQueryInput implements IQuery
{
    private readonly int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}