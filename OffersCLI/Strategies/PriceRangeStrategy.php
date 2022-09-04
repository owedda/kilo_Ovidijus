<?php declare(strict_types=1);

namespace Strategies;

use Ovidijus\OffersPackage\OfferCollectionInterface;

class PriceRangeStrategy implements OfferCountStrategyInterface
{
    public function getCount(array $args, OfferCollectionInterface $collection): int
    {
        $answer = 0;

        for ($i = 0; $i < $collection->getCount() ; $i++) {
            $price = $collection->get($i)->price;
            if (floatval($args[2]) <= $price &&  $price <= floatval($args[3])) {
                $answer++;
            }
        }
        return $answer;
    }
}
