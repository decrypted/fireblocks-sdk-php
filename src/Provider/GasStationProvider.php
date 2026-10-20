<?php

declare(strict_types=1);

namespace Jaddek\Fireblocks\Http\Provider;

use Jaddek\Fireblocks\Http\Endpoint\GasStationInterface;
use Jaddek\Fireblocks\Http\Request\GasStation\Configuration;

final class GasStationProvider extends Provider
{
    public function __construct(private GasStationInterface $endpoint)
    {

    }

    public function getSettings(): array
    {
        $response = $this->endpoint->retrieveSettings();

        return $response->toArray();
    }

    public function updateSettings(Configuration $configuration)
    {
        $response = $this->endpoint->editSettings($configuration);

        return $response->toArray();
    }

    public function getSettingsByAsset(string $assetId): array
    {
        $response = $this->endpoint->retrieveSettingsByAsset($assetId);

        return $response->toArray();
    }

    public function updateSettingsByAsset(string $assetId, Configuration $configuration): array
    {
        $response = $this->endpoint->editSettingsByAsset($assetId, $configuration);

        return $response->toArray();
    }

}