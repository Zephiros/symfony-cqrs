<?php

namespace App\Kernel\Application;

use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Throwable;

final class InMemoryQueryBus implements IQueryBus
{
    private MessageBus $bus;

    /**
     * @throws ReflectionException
     */
    public function __construct(iterable $queryHandlers)
    {
        $this->bus = new MessageBus([
            new HandleMessageMiddleware(
                new HandlersLocator(
                    HandlerBuilder::fromCallables($queryHandlers),
                ),
            ),
        ]);
    }

    /**
     * @throws Throwable
     */
    public function ask(IQuery $query) : ?IQueryResult
    {
        try {
            return $this->bus->dispatch($query)->last(HandledStamp::class)->getResult();
        } catch (NoHandlerForMessageException) {
            throw new InvalidArgumentException(sprintf('The query has not a valid handler: %s', $query::class));
        }
    }
}