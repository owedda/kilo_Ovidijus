<?php

namespace Tests;

use Ovidijus\OffersPackage\Offer;
use Ovidijus\OffersPackage\OfferCollection;
use PHPUnit\Framework\TestCase;
use Strategies\PriceRangeStrategy;

final class PriceRangeStrategyTests extends TestCase
{
    public function testPriceRangeStrategyCorrectValues()
    {
        //Arrange
        $collection = $this->arrange();
        $arguments = ["run.php", "count_by_vendor_id", 10.55, 200.50];
        //Act
        $strategy = new PriceRangeStrategy();
        $count = $strategy->getCount($arguments, $collection);
        //Assert

        $this->assertEquals(3, $count);
    }

    public function testPriceRangeStrategyCorrectValuesAndStringArgument()
    {
        //Arrange
        $collection = $this->arrange();
        $arguments = ["run.php", "count_by_vendor_id", "15", "200.50"];
        //Act
        $strategy = new PriceRangeStrategy();
        $count = $strategy->getCount($arguments, $collection);
        //Assert

        $this->assertNotEquals(3, $count);
    }

    public function testPriceRangeStrategyInCorrectValues()
    {
        //Arrange
        $collection = $this->arrange();
        $arguments = ["run.php", "count_by_vendor_id", 0.5, 9];
        //Act
        $strategy = new PriceRangeStrategy();
        $count = $strategy->getCount($arguments, $collection);
        //Assert

        $this->assertEquals(0, $count);
    }

    private function arrange(): OfferCollection
    {
        $offer1 = new Offer(10, "Banana", 15, floatval(10.55));
        $offer2 = new Offer(100, "Apple", 15, floatval(100.55));
        $offer3 = new Offer(450, "Peach", 2, floatval(525.25));
        $offer4 = new Offer(1, "Coconut", 6, floatval(0));
        $offer5 = new Offer(2, "Kiwi", 9, floatval(99.99));

        $collection = new OfferCollection();
        $collection->add($offer1);
        $collection->add($offer2);
        $collection->add($offer3);
        $collection->add($offer4);
        $collection->add($offer5);

        return $collection;
    }
}