<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\SupportedAssets;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class Asset implements ItemInterface
{
    public function __construct(
        public string $id,
        public string $name,
        public string $type,
        public string $contractAddress,
        public string $nativeAsset,
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
     * @return string
     */
    public function getContractAddress(): string
    {
        return $this->contractAddress;
    }

    /**
     * @return string
     */
    public function getNativeAsset(): string
    {
        return $this->nativeAsset;
    }
}