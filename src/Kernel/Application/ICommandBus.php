<?php

namespace App\Kernel\Application;

interface ICommandBus
{
    public function dispatch(ICommand $command) : ?ICommandResult;
}