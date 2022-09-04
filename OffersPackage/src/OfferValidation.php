<?php declare(strict_types=1);

namespace Ovidijus\OffersPackage;

use Exception;

class OfferValidation implements ValidateInterface
{
    /**
     * @throws Exception
     */
    public function validate(array $input): void
    {
        $this->validateOfferId($input[0]);
        $this->validateProductTitle($input[1]);
        $this->validateVendorId($input[2]);
        $this->validatePrice($input[3]);
    }

    private function validateOfferId(int $offerId): void
    {
        if ($offerId === null || $offerId < 0) {
            throw new Exception();
        }
    }

    private function validateProductTitle(string $productTitle): void
    {
        if ($productTitle === null) {
            throw new Exception();
        }
    }

    private function validateVendorId(int $vendorId): void
    {
        if ($vendorId === null || $vendorId < 0) {
            throw new Exception();
        }
    }

    private function validatePrice(float $price): void
    {
        if ($price === null || $price < 0) {
            throw new Exception();
        }
    }
}
