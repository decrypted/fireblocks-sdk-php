<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Endpoint;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Jaddek\Fireblocks\Http\Request\GasStation\Configuration;

final class GasStation extends Endpoint implements GasStationInterface
{
    public function retrieveSettings(): ResponseInterface
    {
        $url = '/v1/gas_station';

        return $this->request('GET', $url);
    }

    public function editSettings(Configuration $configuration): ResponseInterface
    {
        $url = '/v1/gas_station/configuration';

        return $this->request('PUT', $url, [
            'json' => $configuration
        ]);
    }

    public function retrieveSettingsByAsset(string $assetId): ResponseInterface
    {
        $url = strtr('/v1/gas_station/{assetId}', [
            '{assetId}' => urlencode($assetId),
        ]);

        return $this->request('GET', $url);
    }

    public function editSettingsByAsset(string $assetId, Configuration $configuration): ResponseInterface
    {
        $url = strtr('/v1/gas_station/configuration/{assetId}', [
            '{assetId}' => urlencode($assetId),
        ]);

        return $this->request('PUT', $url, [
            'json' => $configuration
        ]);
    }
}