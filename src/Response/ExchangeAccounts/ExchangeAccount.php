<?php


declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\ExchangeAccounts;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class ExchangeAccount implements ItemInterface
{
    public function __construct(
        public string                    $id,
        public string                    $name,
        public string                    $type,
        public AssetCollection           $assets,
        public bool                      $isSubaccount,
        public string                    $status,
        public TradingAccountsCollection $tradingAccounts,
        public ?string                   $fundableAccountType,
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return AssetCollection
     */
    public function getAssets(): AssetCollection
    {
        return $this->assets;
    }

    /**
     * @return bool
     */
    public function isSubaccount(): bool
    {
        return $this->isSubaccount;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return TradingAccountsCollection
     */
    public function getTradingAccounts(): TradingAccountsCollection
    {
        return $this->tradingAccounts;
    }

    /**
     * @return string|null
     */
    public function getFundableAccountType(): ?string
    {
        return $this->fundableAccountType;
    }
}