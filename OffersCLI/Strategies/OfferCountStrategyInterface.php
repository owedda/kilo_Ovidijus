<?php declare(strict_types=1);

namespace Strategies;

use Ovidijus\OffersPackage\OfferCollectionInterface;

interface OfferCountStrategyInterface
{
    public function getCount(array $args, OfferCollectionInterface $collection): int;
}
