<?php


declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Vault;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class NewWallet implements ItemInterface
{
    public function __construct(
        public string  $id,
        public string  $address,
        public string  $legacyAddress,
        public ?string $enterpriseAddress,
        public ?string $tag,
        public ?string $eosAccountName,
        public ?string $status,
        public ?string $activationTxId,
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
     * @return string
     */
    public function getEnterpriseAddress(): string
    {
        return $this->enterpriseAddress;
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
    public function getEosAccountName(): string
    {
        return $this->eosAccountName;
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
    public function getActivationTxId(): string
    {
        return $this->activationTxId;
    }
}
