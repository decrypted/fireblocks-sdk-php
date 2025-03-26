<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response;

use JsonSerializable;

abstract class Collection implements CollectionInterface, JsonSerializable
{
    public array $collection;

    protected array $paging = [];
    protected ?string $previousUrl = null;
    protected ?string $nextUrl = null;

    public function jsonSerialize()
    {
        return $this->collection;
    }

    public function add(ItemInterface $item): void
    {
        $this->collection[] = $item;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }

    public function getPaging(): array
    {
        return $this->paging;
    }

    public function setPaging(array $paging): void
    {
        $this->paging = $paging;
    }

    public function getPreviousUrl(): ?string
    {
        return $this->previousUrl;
    }

    public function setPreviousUrl(?string $previousUrl): void
    {
        $this->previousUrl = $previousUrl;
    }

    public function getNextUrl(): ?string
    {
        return $this->nextUrl;
    }

    public function setNextUrl(?string $nextUrl): void
    {
        $this->nextUrl = $nextUrl;
    }
}
