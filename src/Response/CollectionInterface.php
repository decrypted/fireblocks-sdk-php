<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response;

interface CollectionInterface
{
    public static function getSupportedItem(): string;

    public static function getItemsKey(): string;

    public function add(ItemInterface $item): void;

    /**
     * @return array<ItemInterface>
     */
    public function getCollection(): array;

    public function setPaging(array $paging): void;

    public function setPreviousUrl(?string $previousUrl): void;

    public function setNextUrl(?string $nextUrl): void;

    public function getPaging(): array;

    public function getPreviousUrl(): ?string;

    public function getNextUrl(): ?string;
}
