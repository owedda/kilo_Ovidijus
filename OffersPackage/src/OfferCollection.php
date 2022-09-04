<?php declare(strict_types=1);

namespace Ovidijus\OffersPackage;

use ArrayIterator;

class OfferCollection implements OfferCollectionInterface
{
    private array $offers;
    private int $count;

    public function __construct()
    {
        $this->offers = [];
        $this->count = 0;
    }

    public function get(int $index): OfferInterface
    {
        return $this->offers[$index];
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->offers);
    }

    public function add(OfferInterface $value): void
    {
       $this->offers[$this->count] = $value;
       $this->count++;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
