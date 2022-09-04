<?php declare(strict_types=1);

namespace Tasks;

interface OffersServicesInterface
{
    public function doTask(array $args, $apiUrl): int;
}
