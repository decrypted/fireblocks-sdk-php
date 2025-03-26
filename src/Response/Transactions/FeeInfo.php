<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Transactions;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class FeeInfo implements ItemInterface
{
    public function __construct(
        public ?string $networkFee,
        public ?string $serviceFee,
    )
    {

    }

    /**
     * @return string
     */
    public function getNetworkFee(): string
    {
        return $this->networkFee;
    }

    /**
     * @return string
     */
    public function getServiceFee(): string
    {
        return $this->serviceFee;
    }
}