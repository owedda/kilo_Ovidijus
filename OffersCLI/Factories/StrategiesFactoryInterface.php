<?php declare(strict_types=1);

namespace Factories;

use Strategies\OfferCountStrategyInterface;

interface StrategiesFactoryInterface
{
    public function getStrategy(string $strategyType): OfferCountStrategyInterface;
}
