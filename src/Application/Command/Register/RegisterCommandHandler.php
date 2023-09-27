<?php

namespace App\Application\Command\Register;

use App\Domain\Entity\User;
use App\Domain\Entity\UserSetting;
use App\Domain\Enum\Theme;
use App\Domain\Repository\IUserRepository;
use App\Kernel\Application\ICommandHandler;

final class RegisterCommandHandler implements ICommandHandler
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {}

    public function __invoke(RegisterCommandInput $command) : ?RegisterCommandResult
    {
        $user = new User(
            $command->getName(),
            $command->getEmail(),
            $command->getUsername(),
            $command->getPassword()
        );

        $user->setUserSetting(new UserSetting(Theme::Dark));

        $this->userRepository->add($user, true);

        return new RegisterCommandResult($user->getId());
    }
}