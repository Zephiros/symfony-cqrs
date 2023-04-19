<?php

namespace App\API\Controller;

use App\Kernel\Application\ICommandBus;
use App\Application\Command\Register\RegisterCommandInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users", name="users")
 */
final class UserController extends AbstractController
{
    public function __construct(
        private readonly ICommandBus $commandBus,
    ) {}

    /**
     * @Route("/", methods={"GET"}, name="users_get_all")
     */
    public function GetAll() : JsonResponse
    {
        $result = $this->commandBus->dispatch(
            new RegisterCommandInput(
                "Alex",
                "alex.batista@infinitycopy.ai",
                "alex",
                "123456")
        );

        return new JsonResponse("");
    }
}