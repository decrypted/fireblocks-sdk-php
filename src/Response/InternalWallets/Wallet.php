<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\InternalWallets;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Wallet implements ItemInterface
{
    public function __construct(
        public string          $id,
        public string          $name,
        public string          $customerRefId,
        public AssetCollection $assets,
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCustomerRefId(): string
    {
        return $this->customerRefId;
    }

    /**
     * @return AssetCollection
     */
    public function getAssets(): AssetCollection
    {
        return $this->assets;
    }
}