<?php

namespace App\Kernel\Application;

interface IQueryBus
{
    public function ask(IQuery $query) : ?IQueryResult;
}