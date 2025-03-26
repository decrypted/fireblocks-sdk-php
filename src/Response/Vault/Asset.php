<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Vault;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Asset implements ItemInterface
{
    //https://developers.fireblocks.com/reference/getpagedvaultaccounts
    public function __construct(
        public string  $id,
        public string  $total,
        public string  $lockedAmount,
        public string  $available,
        public string  $pending,
        public string  $frozen,
        public ?string $blockHeight,
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
    public function getTotal(): string
    {
        return $this->total;
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
    public function getAvailable(): string
    {
        return $this->available;
    }

    /**
     * @return string
     */
    public function getPending(): string
    {
        return $this->pending;
    }

    /**
     * @return string
     */
    public function getFrozen(): string
    {
        return $this->frozen;
    }

    /**
     * @return string
     */
    public function getBlockHeight(): string
    {
        return $this->blockHeight;
    }
}
