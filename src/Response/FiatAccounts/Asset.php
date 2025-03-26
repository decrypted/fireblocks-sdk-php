<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\FiatAccounts;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Asset implements ItemInterface
{
    public function __construct(
        public string $id,
        public string $balance,
    )
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBalance(): string
    {
        return $this->balance;
    }
}