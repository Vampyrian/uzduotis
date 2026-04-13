<?php

declare(strict_types=1);

namespace App\Collection;

/**
 * @template T
 */
class Collection
{
    /** @var T[] */
    private array $items = [];

    /** @param T $item */
    public function add(mixed $item): void
    {
        $this->items[] = $item;
    }

    /** @return T[] */
    public function all(): array
    {
        return $this->items;
    }

    /** @return T */
    public function random(): mixed
    {
        return $this->items[array_rand($this->items)];
    }
}
