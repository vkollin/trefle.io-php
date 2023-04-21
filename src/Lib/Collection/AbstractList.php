<?php

declare(strict_types = 1);

namespace Trefle\Lib\Collection;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use ReturnTypeWillChange;

/**
 * @template T
 * @todo extract to separate package
 */
abstract class AbstractList implements IteratorAggregate, Countable, ArrayAccess, JsonSerializable
{
    /**
     * @var T[]
     */
    protected array $items = [];

    /**
     * @param T[] $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return T[]
     */
    public function all(): array
    {
        return $this->items;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    /**
     * @param int $offset
     * @return T
     */
    #[ReturnTypeWillChange] public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    /**
     * @param int $offset
     * @param T $value
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->items[$offset]);
    }

    public function jsonSerialize(): array
    {
        return $this->items;
    }
}
