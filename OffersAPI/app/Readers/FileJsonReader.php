<?php declare(strict_types=1);

namespace App\Readers;

use Ovidijus\OffersPackage\OfferCollection;
use Ovidijus\OffersPackage\OfferCollectionInterface;
use Ovidijus\OffersPackage\ReaderInterface;
use Ovidijus\OffersPackage\Offer;

class FileJsonReader implements ReaderInterface
{
    /**
     * @throws \Exception
     */
    public function read(string $input): OfferCollectionInterface
    {
        $collection = new OfferCollection();
        $fileData = file_get_contents($input);
        $elements = json_decode($fileData, true);

        foreach ($elements as $element) {
            $offer = new Offer(intval($element['offerId']), $element['productTitle'], intval($element['vendorId']), floatval($element['price']));
            $collection->add($offer);
        }

        return $collection;
    }
}
