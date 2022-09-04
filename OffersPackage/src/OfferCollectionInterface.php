<?php declare(strict_types=1);

namespace Ovidijus\OffersPackage;

//Interface for The Collection class that contains Offers
use ArrayIterator;

interface OfferCollectionInterface
{
    public function get(int $index): OfferInterface;
    public function getIterator(): ArrayIterator;
    public function add(OfferInterface $value): void;
    public function getCount(): int;
}
