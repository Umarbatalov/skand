<?php

namespace Skand\Container;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries;

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            throw new NotFoundException(sprintf('No entry was found for %s identifier.', $id));
        }

        if (!is_callable($this->entries[$id])) {
            throw new ContainerException('Error while retrieving the entry.');
        }

        return call_user_func($this->entries[$id], $this);
    }

    /**
     * @inheritDoc
     */
    public function has($id): bool
    {
        return isset($this->entries[$id]);
    }

    /**
     * @param string $id
     * @param callable $val
     */
    public function set(string $id, callable $val): void
    {
        if (!isset($this->entries[$id])) {
            $this->entries[$id] = $val;
        }
    }
}
