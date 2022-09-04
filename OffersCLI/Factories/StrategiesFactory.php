<?php declare(strict_types=1);

namespace Factories;

use http\Exception;
use Strategies\OfferCountStrategyInterface;
use Strategies\PriceRangeStrategy;
use Strategies\VendorIdStrategy;
use Factories\StrategiesFactoryInterface;

class StrategiesFactory implements StrategiesFactoryInterface
{
    public function getStrategy(string $strategyType): OfferCountStrategyInterface
    {
        return match ($strategyType) {
            "count_by_price_range" => new PriceRangeStrategy(),
            "count_by_vendor_id" => new VendorIdStrategy()
        };
    }
}
