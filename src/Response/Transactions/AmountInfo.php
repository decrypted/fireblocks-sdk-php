<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Transactions;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class AmountInfo implements ItemInterface
{
    public function __construct(
        public string  $amount,
        public ?string $requestedAmount,
        public ?string $netAmount,
        public ?string $amountUSD,
    )
    {
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
    public function getRequestedAmount(): string
    {
        return $this->requestedAmount;
    }

    /**
     * @return string
     */
    public function getNetAmount(): string
    {
        return $this->netAmount;
    }

    /**
     * @return string
     */
    public function getAmountUSD(): string
    {
        return $this->amountUSD;
    }
}
