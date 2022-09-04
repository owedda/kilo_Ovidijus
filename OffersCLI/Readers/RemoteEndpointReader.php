<?php declare(strict_types=1);

namespace Readers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Ovidijus\OffersPackage\Offer;
use Ovidijus\OffersPackage\OfferCollection;
use Ovidijus\OffersPackage\ReaderInterface;
use Ovidijus\OffersPackage\OfferCollectionInterface;

class RemoteEndpointReader implements ReaderInterface
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function read(string $input): OfferCollectionInterface
    {
        $collection = new OfferCollection();
        $response = $this->client->request('GET', $input);

        $elements = json_decode($response->getBody()->getContents(), true);

            foreach ($elements as $element) {
                $offer = new Offer(intval($element['offerId']), $element['productTitle'], intval($element['vendorId']), floatval($element['price']));
                $collection->add($offer);
            }

        return $collection;
    }
}
