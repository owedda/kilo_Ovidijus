<?php declare(strict_types=1);

namespace Outputs;


use Ovidijus\OffersPackage\OfferCollectionInterface;
use Strategies\OfferCountStrategyInterface;

class CLIOutputs implements OutputsInterface
{
    public function printCount(OfferCountStrategyInterface $strategy, array $arguments, OfferCollectionInterface $data): void
    {
        $count = $strategy->getCount($arguments, $data);
        echo "Quantity of objects that are in stock {$count}";
    }

    public function printErrorMessage(string $message)
    {
        echo $message;
    }
}
