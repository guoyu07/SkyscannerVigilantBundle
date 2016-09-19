<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Api\Processor;

use Psr\Log\LoggerAwareTrait;

class LivePricePostProcessor {
    use LoggerAwareTrait;

    const MAX_PARSED_DEALS = 5;

    /**
     * @var float
     */
    private $minimumPrice;

    /**
     * @param float $maximumPrice
     * @return $this
     */
    public function defineDealMaxPrice($maximumPrice) {
        if (!is_numeric($maximumPrice)) {
            throw new \InvalidArgumentException(sprintf('Expecting numeric received %s', gettype($maximumPrice)));
        }

        $this->minimumPrice = $maximumPrice;

        return $this;
    }

    public function process(\stdClass $response) {
        print_r($this->logger);
        $this->logger->debug("The response received is: %s", json_encode($response->parsed, true));

        //var_dump($response);die;
        #$parsed = $response->parsed;
        $itineraries = $response->Itineraries;
        $cheaperItineraries = array_slice($itineraries, 0, static::MAX_PARSED_DEALS);

        $maxPrice = 5000;
//        $dealFound = false;
        $resultCount = 1;
        foreach ($cheaperItineraries as $itinerary) {
            $this->logger->debug('Verifying itinerary #'. $resultCount++);

            if (!isset($itinerary->PricingOptions[0])) {
                continue;
            }

            $price = $itinerary->PricingOptions[0]->Price;
            $deepLinkUrl = $itinerary->PricingOptions[0]->DeeplinkUrl;

            if ($price <= $maxPrice) {
//                $dealFound = true;
                $this->logger->debug("Bom preço encontrado ($price) ($deepLinkUrl)");
                continue;
            }

            $this->logger->debug("skipping...");
        }
    }
}
