<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\SmartTransfers;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Term implements ItemInterface
{
    public function __construct(
        public string $termId,
        public string $txId,
        public string $networkConnectionId,
        public bool   $outgoing,
        public string $amount,
        public string $asset,
        public string $status,
        public string $description,
    )
    {

    }

    /**
     * @return string
     */
    public function getTermId(): string
    {
        return $this->termId;
    }

    /**
     * @return string
     */
    public function getTxId(): string
    {
        return $this->txId;
    }

    /**
     * @return string
     */
    public function getNetworkConnectionId(): string
    {
        return $this->networkConnectionId;
    }

    /**
     * @return bool
     */
    public function isOutgoing(): bool
    {
        return $this->outgoing;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getAsset(): string
    {
        return $this->asset;
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
    public function getDescription(): string
    {
        return $this->description;
    }
}