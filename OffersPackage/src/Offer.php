<?php declare(strict_types=1);

namespace Ovidijus\OffersPackage;

use Exception;

class Offer implements OfferInterface
{
    public int $offerId;
    public string $productTitle;
    public int $vendorId;
    public float $price;

    /**
     * @throws Exception
     */
    function __construct(int $offerId, string $productTitle, int $vendorId, float $price)
    {
        $parameters = [$offerId, $productTitle, $vendorId, $price];
        $validator = new OfferValidation();
        $validator->validate($parameters);

        $this->offerId = $offerId;
        $this->productTitle = $productTitle;
        $this->vendorId = $vendorId;
        $this->price = $price;
    }
}
