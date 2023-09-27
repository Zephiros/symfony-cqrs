<?php

namespace App\API\Controller;

use App\Kernel\API\ApiResponse;
use App\Kernel\API\BaseController;
use App\Kernel\Application\ICommandBus;
use App\Kernel\Application\IQueryBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Application\Command\Register\RegisterCommandInput;

use App\Application\Query\GetUsers\GetUsersQueryInput;
use App\Application\Query\GetUserById\GetUserByIdQueryInput;

/**
 * @Route("/users", name="users")
 */
final class UserController extends BaseController
{
    public function __construct(
        private readonly ICommandBus $commandBus,
        private readonly IQueryBus $queryBus
    ) { parent::__construct(); }

    /**
     * @Route("/", methods={"POST"}, name="users_register")
     */
    public function Register(Request $request) : ApiResponse
    {
        $data = json_decode($request->getContent());

        $command = new RegisterCommandInput($data->name, $data->email, $data->username, $data->password);
        $result = $this->commandBus->dispatch($command);

        return $this->HandleResult($result);
    }

    /**
     * @Route("/", methods={"GET"}, name="users_list")
     */
    public function List() : ApiResponse
    {
        $query = new GetUsersQueryInput();
        $result = $this->queryBus->ask($query);

        return $this->HandleResult($result);
    }

    /**
     * @Route("/{id}", methods={"GET"}, name="users_get")
     */
    public function Get(string $id) : ApiResponse
    {
        $query = new GetUserByIdQueryInput($id);
        $result = $this->queryBus->ask($query);

        return $this->HandleResult($result);
    }
}