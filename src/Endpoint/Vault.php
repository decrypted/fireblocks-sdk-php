<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Endpoint;

use Symfony\Contracts\HttpClient\ResponseInterface;

final class Vault extends Endpoint implements VaultInterface
{
    public function getAccounts(): ResponseInterface
    {
        $url = '/v1/vault/accounts';

        return $this->request('GET', $url);
    }

    public function getAccountsPaged(?string $namePrefix = null, ?string $nameSuffix = null, ?float $minAmountThreshold = null, ?string $assetId = null, ?string $orderBy = null, ?string $before = null, ?string $after = null, ?int $limit = null): ResponseInterface
    {
        $url = '/v1/vault/accounts_paged';

        $data = [];
        if ($namePrefix) {
            $data['namePrefix'] = $namePrefix;
        }
        if ($nameSuffix) {
            $data['nameSuffix'] = $nameSuffix;
        }
        if ($minAmountThreshold) {
            $data['minAmountThreshold'] = $minAmountThreshold;
        }
        if ($assetId) {
            $data['assetId'] = $assetId;
        }
        if ($orderBy) {
            $data['orderBy'] = $orderBy;
        }
        if ($before) {
            $data['before'] = $before;
        }
        if ($after) {
            $data['after'] = $after;
        }
        if ($limit) {
            $data['limit'] = $limit;
        }
        if (count($data)) {
            $url .= '?' . http_build_query($data);
        }
        return $this->request('GET', $url);
    }

    public function getAccount(string $vaultAccountId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}', [
            '{vaultAccountId}' => urlencode($vaultAccountId)
        ]);

        return $this->request('GET', $url);
    }

    public function createNewAccount(string $name, bool $hiddenOnUI, bool $autoFuel, ?string $customerRefId, ?string $IdempotencyKey = null): ResponseInterface
    {
        $url = '/v1/vault/accounts';
        $options = [
            'json' => [
                'name' => $name,
                'hiddenOnUI' => $hiddenOnUI,
                'autoFuel' => $autoFuel,
            ]
        ];

        if ($customerRefId) {
            $options['json']['customerRefId'] = $customerRefId;
        }

        return $this->request('POST', $url, $options, $IdempotencyKey);
    }

    public function renameAccount(string $vaultAccountId, string $name): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
        ]);

        $options = [
            'json' => [
                'name' => $name,
            ]
        ];

        return $this->request('PUT', $url, $options);
    }

    public function getBalanceOfAccountAsset(string $vaultAccountId, string $assetId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId)
        ]);

        return $this->request('GET', $url);
    }

    public function createNewWallet(string $vaultAccountId, string $assetId, ?string $IdempotencyKey = null): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId)
        ]);

        return $this->request('POST', $url, [], $IdempotencyKey);
    }

    public function hideAccountInWebConsole(string $vaultAccountId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/hide', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
        ]);

        return $this->request('POST', $url);
    }

    public function showAccountInWebConsole(string $vaultAccountId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/unhide', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
        ]);

        return $this->request('POST', $url);
    }

    public function getAccountAddresses(string $vaultAccountId, string $assetId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/addresses', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId),
        ]);

        return $this->request('GET', $url);
    }

    public function getAccountAddressesPaged(string $vaultAccountId, string $assetId, ?string $before = null, ?string $after = null, int $limit = 100): ResponseInterface
    {
        $data = [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}' => urlencode($assetId),
        ];
        if ($before) {
            $data['before'] = $before;
        }
        if ($after) {
            $data['after'] = $after;
        }
        if ($limit) {
            $data['limit'] = $limit;
        }
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/addresses_paginated', $data);
        return $this->request('GET', $url);
    }

    public function createDepositAddress(string $vaultAccountId, string $assetId, ?string $description = null, ?string $customerRefId = null, ?string $IdempotencyKey = null): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/addresses', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId),
        ]);

        $options = [
            'json' => [
            ]
        ];

        if ($description) {
            $options['json']['description'] = $description;
        }
        if ($customerRefId) {
            $options['json']['customerRefId'] = $customerRefId;
        }

        return $this->request('POST', $url, $options, $IdempotencyKey);
    }

    public function renameAddress(string $vaultAccountId, string $assetId, string $addressId, string $description): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/addresses/{addressId}', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId),
            '{addressId}'      => urlencode($addressId),
        ]);

        $options = [
            'json' => [
                'description' => $description,
            ]
        ];

        return $this->request('PUT', $url, $options);
    }

    public function getMaximumSpendableAmount(string $vaultAccountId, string $assetId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/max_spendable_amount', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId),
        ]);

        return $this->request('GET', $url);
    }

    public function setAmlCustomerRefIDForAccount(string $vaultAccountId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/set_customer_ref_id', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
        ]);

        return $this->request('POST', $url);
    }

    public function setAmlCustomerRefIDForAddress(string $vaultAccountId, string $addressId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/addresses/{addressId}/set_customer_ref_id', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{addressId}'      => urlencode($addressId),
        ]);

        return $this->request('POST', $url);
    }

    public function getUnspentInputs(string $vaultAccountId, string $assetId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/unspent_inputs', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId),
        ]);

        return $this->request('GET', $url);
    }

    public function getPublicKeyByDerivationPath(): ResponseInterface
    {
        $url = '/v1/vault/public_key_info';

        return $this->request('GET', $url);
    }

    public function getPublicKeyOfFireBlockAddress(string $vaultAccountId, string $assetId, string $change, string $addressIndex): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/{assetId}/{change}/{addressIndex}/public_key_info', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
            '{assetId}'        => urlencode($assetId),
            '{change}'         => urlencode($change),
            '{addressIndex}'   => urlencode($addressIndex),
        ]);

        return $this->request('GET', $url);
    }

    public function setAutoFuelProperties(string $vaultAccountId): ResponseInterface
    {
        $url = strtr('/v1/vault/accounts/{vaultAccountId}/set_auto_fuel', [
            '{vaultAccountId}' => urlencode($vaultAccountId),
        ]);

        return $this->request('POST', $url);
    }

    public function getVaultBalance(): ResponseInterface
    {
        $url = '/v1/vault/assets';

        return $this->request('GET', $url);
    }

    public function getAssetValueBalance(string $assetId): ResponseInterface
    {
        $url = strtr('/v1/vault/assets/{assetId}', [
            '{assetId}' => urlencode($assetId),
        ]);

        return $this->request('GET', $url);
    }
}
