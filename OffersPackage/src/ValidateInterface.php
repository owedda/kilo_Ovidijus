<?php declare(strict_types=1);

namespace Ovidijus\OffersPackage;

interface ValidateInterface
{
    public function validate(array $input): void;
}