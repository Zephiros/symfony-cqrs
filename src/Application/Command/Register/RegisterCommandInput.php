<?php

namespace App\Application\Command\Register;

use App\Kernel\Application\ICommand;

final class RegisterCommandInput implements ICommand
{
    private readonly string $name;
    private readonly string $email;
    private readonly string $username;
    private readonly string $password;

    public function __construct(string $name, string $email, string $username, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}