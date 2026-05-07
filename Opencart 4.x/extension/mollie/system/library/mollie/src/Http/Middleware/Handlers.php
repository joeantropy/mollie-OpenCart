<?php

namespace Mollie\Api\Http\Middleware;

class Handlers
{
    /**
     * @var array<Handler>
     */
    protected array $handlers = [];
    public function add(callable $handler, ?string $name = null, string $priority = \Mollie\Api\Http\Middleware\MiddlewarePriority::MEDIUM) : void
    {
        if (\in_array($name, [\Mollie\Api\Http\Middleware\MiddlewarePriority::HIGH, \Mollie\Api\Http\Middleware\MiddlewarePriority::MEDIUM, \Mollie\Api\Http\Middleware\MiddlewarePriority::LOW])) {
            $priority = $name;
            $name = null;
        }
        if (\is_string($name) && $this->handlerExists($name)) {
            throw new \InvalidArgumentException("Handler with name '{$name}' already exists.");
        }
        $this->handlers[] = new \Mollie\Api\Http\Middleware\Handler($handler, $name, $priority);
    }
    public function setHandlers(array $handlers) : void
    {
        $this->handlers = $handlers;
    }
    public function getHandlers() : array
    {
        return $this->handlers;
    }
    /**
     * Execute the handlers
     *
     * @param  mixed  $payload
     * @return mixed
     */
    public function execute($payload)
    {
        /** @var Handler $handler */
        foreach ($this->sortHandlers() as $handler) {
            $payload = \call_user_func($handler->callback(), $payload);
        }
        return $payload;
    }
    protected function sortHandlers() : array
    {
        $highPriority = [];
        $mediumPriority = [];
        $lowPriority = [];
        $priorityMap = [\Mollie\Api\Http\Middleware\MiddlewarePriority::HIGH => &$highPriority, \Mollie\Api\Http\Middleware\MiddlewarePriority::MEDIUM => &$mediumPriority, \Mollie\Api\Http\Middleware\MiddlewarePriority::LOW => &$lowPriority];
        foreach ($this->handlers as $handler) {
            $priorityMap[$handler->priority()][] = $handler;
        }
        return \array_merge($highPriority, $mediumPriority, $lowPriority);
    }
    private function handlerExists(string $name) : bool
    {
        foreach ($this->handlers as $handler) {
            if ($handler->name() === $name) {
                return \true;
            }
        }
        return \false;
    }
}
