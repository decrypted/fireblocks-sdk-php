<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Transactions;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Signature implements ItemInterface
{
    public function __construct(
        public string $r,
        public string $s,
        public int    $v,
    )
    {
    }

    /**
     * @return string
     */
    public function getR(): string
    {
        return $this->r;
    }

    /**
     * @return string
     */
    public function getS(): string
    {
        return $this->s;
    }

    /**
     * @return int
     */
    public function getV(): int
    {
        return $this->v;
    }
}
