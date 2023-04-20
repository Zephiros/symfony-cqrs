<?php

namespace App\Application\Query\GetUserById;

use App\Domain\Repository\IUserRepository;
use App\Kernel\Application\IQueryHandler;
use InvalidArgumentException;

final class GetUserByIdQueryHandler implements IQueryHandler
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {}

    public function __invoke(GetUserByIdQueryInput $query) : ?GetUserByIdQueryResult
    {
        $user = $this->userRepository->get($query->getId());

        if ($user === null) {
            throw new InvalidArgumentException('User not found');
        }

        return new GetUserByIdQueryResult($user->getId(), $user->getName());
    }
}