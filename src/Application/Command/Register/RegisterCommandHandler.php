<?php

namespace App\Application\Command\Register;

use App\Domain\Entity\User;
use App\Domain\Repository\IUserRepository;
use App\Kernel\Application\ICommand;
use App\Kernel\Application\ICommandHandler;

final class RegisterCommandHandler implements ICommandHandler
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {}

    public function __invoke(ICommand $commandInput) : ?RegisterCommandResult
    {
        $user = new User(
            $commandInput->getName(),
            $commandInput->getEmail(),
            $commandInput->getUsername(),
            $commandInput->getPassword()
        );

        $this->userRepository->add($user);

        return new RegisterCommandResult($user->getId());
    }
}