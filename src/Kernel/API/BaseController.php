<?php

namespace App\Kernel\API;

use App\Kernel\Application\ICommandResult;
use App\Kernel\Application\IQueryResult;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    public function __construct()
    {
    }

    protected function HandleResult(ICommandResult|IQueryResult $result) : ApiResponse
    {
        if ($result instanceof ICommandResult) {
            return $this->HandleCommandResult($result);
        }

        return $this->HandleQueryResult($result);
    }

    private function HandleCommandResult(ICommandResult $result) : ApiResponse
    {
        return new ApiResponse($result);
    }

    private function HandleQueryResult(IQueryResult $result) : ApiResponse
    {
        return new ApiResponse($result);
    }
}