<?php declare(strict_types=1);

namespace Outputs;

use Ovidijus\OffersPackage\OfferCollectionInterface;
use Strategies\OfferCountStrategyInterface;

interface OutputsInterface
{
    public function printCount(OfferCountStrategyInterface $strategy, array $arguments, OfferCollectionInterface $data): void;
    public function printErrorMessage(string $message);
}
