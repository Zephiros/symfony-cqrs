<?php

namespace App\API\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users", name="users")
 */
final class UserController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="users_get_all")
     */
    public function GetAll() : JsonResponse
    {
        return new JsonResponse("OK");
    }
}