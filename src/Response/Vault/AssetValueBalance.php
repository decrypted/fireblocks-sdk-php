<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Vault;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class AssetValueBalance implements ItemInterface
{
    public function __construct(
        public string  $id,
        public float   $total,
        public int     $pending,
        public int     $lockedAmount,
        public float   $available,
        public int     $frozen,
        public ?string $totalStakedCPU,
        public ?string $totalStakedNetwork,
        public ?string $selfStakedCPU,
        public ?string $selfStakedNetwork,
        public ?string $pendingRefundCPU,
        public ?string $pendingRefundNetwork,
        public ?string $blockHeight,
        public ?string $blockHash
    )
    {

    }

}
