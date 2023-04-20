<?php

namespace App\Application\Query\GetUsers;

use App\Domain\Repository\IUserRepository;
use App\Kernel\Application\IQueryHandler;

final class GetUsersQueryHandler implements IQueryHandler
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {}

    public function __invoke(GetUsersQueryInput $query) : ?GetUsersQueryResult
    {
        $result = new GetUsersQueryResult();

        foreach ($this->userRepository->list() as $user) {
            $result->addItem(
                new GetUsersQueryResultItem($user->getId(), $user->getName())
            );
        }

        return $result;
    }
}