<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\InternalWallets;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Asset implements ItemInterface
{
    public function __construct(
        public string $id,
        public string $balance,
        public string $lockedAmount,
        public string $status,
        public string $activationTime,
        public string $address,
        public string $tag,
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

    /**
     * @return string
     */
    public function getLockedAmount(): string
    {
        return $this->lockedAmount;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getActivationTime(): string
    {
        return $this->activationTime;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }
}