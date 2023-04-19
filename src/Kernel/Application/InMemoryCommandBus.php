<?php

namespace App\Kernel\Application;

use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Throwable;

final class InMemoryCommandBus implements ICommandBus
{
    private MessageBus $bus;

    /**
     * @throws ReflectionException
     */
    public function __construct(
        iterable $commandHandlers
    ) {
        $this->bus = new MessageBus([
            new HandleMessageMiddleware(
                new HandlersLocator(
                    HandlerBuilder::fromCallables($commandHandlers),
                ),
            ),
        ]);
    }

    /**
     * @throws Throwable
     */
    public function dispatch(ICommand $command) : mixed
    {
        try {
            $envelope = $this->bus->dispatch($command);
            $handledStamp = $envelope->last(HandledStamp::class);
            return $handledStamp->getResult();
        } catch (NoHandlerForMessageException) {
            throw new InvalidArgumentException(sprintf('The command has not a valid handler: %s', $command::class));
        } catch (HandlerFailedException $e) {
            throw $e->getPrevious();
        }
    }
}