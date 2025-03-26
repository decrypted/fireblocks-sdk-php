<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Vault;

use Jaddek\Fireblocks\Http\Response\Collection;
use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Account implements ItemInterface
{
    //https://developers.fireblocks.com/reference/getpagedvaultaccounts
    public function __construct(
        public string          $id,
        public string          $name,
        public bool            $hiddenOnUI,
        public bool            $autoFuel,
        public ?string $customerRefId,
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
     * @return bool
     */
    public function isHiddenOnUi(): bool
    {
        return $this->hiddenOnUI;
    }

    /**
     * @return bool
     */
    public function isAutoFuel(): bool
    {
        return $this->autoFuel;
    }

    /**
     * @return Collection<Asset>
     */
    public function getAssets(): Collection
    {
        return $this->assets;
    }

    public function getCustomerRefId(): ?string
    {
        return $this->customerRefId;
    }
}
