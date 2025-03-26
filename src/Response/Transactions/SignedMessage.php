<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Response\Transactions;

use Jaddek\Fireblocks\Http\Response\ItemInterface;

final class SignedMessage implements ItemInterface
{
    public function __construct(
        public string    $content,
        public string    $algorithm,
        public array     $derivationPath,
        public Signature $signature,
        public string    $publicKey,
    )
    {
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * @return array
     */
    public function getDerivationPath(): array
    {
        return $this->derivationPath;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }
}
