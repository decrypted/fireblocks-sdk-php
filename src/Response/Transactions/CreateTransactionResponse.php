<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Transactions;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class CreateTransactionResponse implements ItemInterface
{
    public function __construct(
        public string $id,
        public string $status,
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
    public function getStatus(): string
    {
        return $this->status;
    }
}