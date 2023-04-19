<?php

namespace App\API\Controller;

use App\Domain\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users", name="users")
 */
final class UserController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="users_get_all")
     */
    public function GetAll(ManagerRegistry $doctrine) : JsonResponse
    {
        $users = $doctrine->getRepository(User::class)->findAll();

        return new JsonResponse($users);
    }
}