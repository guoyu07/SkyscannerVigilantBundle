<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Api\Processor;

class LivePricePostProcessor {
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
        //var_dump($response);die;
        #$parsed = $response->parsed;
        $itineraries = $response->Itineraries;
        $cheaperItineraries = array_slice($itineraries, 0, static::MAX_PARSED_DEALS);

        $maxPrice = 5000;
        $dealFound = false;
        $resultCount = 1;
        foreach ($cheaperItineraries as $itinerary) {
            echo 'Verifying itinerary #'. $resultCount++ . ' ';

            if (!isset($itinerary->PricingOptions[0])) {
                continue;
            }

            $price = $itinerary->PricingOptions[0]->Price;
            $deepLinkUrl = $itinerary->PricingOptions[0]->DeeplinkUrl;

            if ($price <= $maxPrice) {
                $dealFound = true;
                echo "Bom preço encontrado ($price) ($deepLinkUrl)" . PHP_EOL;
                continue;
            }

            echo "skipping..." . PHP_EOL;
        }

        if (!$dealFound) {
            echo "Nenhum preço encontrado..." . PHP_EOL;
        } else {
            echo "bons precos";
        }
    }
}
