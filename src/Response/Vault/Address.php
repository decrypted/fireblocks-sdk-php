<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Vault;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Address implements ItemInterface
{
    public function __construct(
        public string $assetId,
        public string $address,
        public string $tag,
        public string $description,
        public string $type,
        public string $addressFormat,
        public string $legacyAddress,
        public string $enterpriseAddress,
    )
    {
    }

    /**
     * @return string
     */
    public function getAssetId(): string
    {
        return $this->assetId;
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

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getAddressFormat(): string
    {
        return $this->addressFormat;
    }

    /**
     * @return string
     */
    public function getLegacyAddress(): string
    {
        return $this->legacyAddress;
    }

    /**
     * @return string
     */
    public function getEnterpriseAddress(): string
    {
        return $this->enterpriseAddress;
    }
}