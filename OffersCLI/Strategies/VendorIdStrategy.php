<?php declare(strict_types=1);

namespace Strategies;

use Ovidijus\OffersPackage\OfferCollectionInterface;

class VendorIdStrategy implements OfferCountStrategyInterface
{
    public function getCount(array $args, OfferCollectionInterface $collection): int
    {
        $answer = 0;

        for ($i = 0; $i < $collection->getCount() ; $i++) {
            $vendorId = $collection->get($i)->vendorId;
            if ($vendorId === intval($args[2])) {
                $answer++;
            }
        }
        return $answer;
    }
}
