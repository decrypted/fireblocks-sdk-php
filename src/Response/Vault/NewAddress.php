<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Vault;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class NewAddress implements ItemInterface
{
    public function __construct(
        public string  $assetId,
        public ?string $description,
        public string  $address,
        public string  $legacyAddress,
        public ?string $tab,
        public ?string $enterpriseAddress,
        public ?int    $bip44AddressIndex,
        public ?string $customerRefId,
    )
    {
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
    public function getLegacyAddress(): string
    {
        return $this->legacyAddress;
    }

    /**
     * @return string|null
     */
    public function getTab(): ?string
    {
        return $this->tab;
    }
}
