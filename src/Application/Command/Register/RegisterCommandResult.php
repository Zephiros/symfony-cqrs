<?php

namespace App\Application\Command\Register;

use App\Kernel\Application\ICommandResult;

final class RegisterCommandResult implements ICommandResult
{
    private readonly int $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}