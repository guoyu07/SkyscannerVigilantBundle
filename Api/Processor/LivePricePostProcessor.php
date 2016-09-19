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
     * @param float $minimumPrice
     * @return $this
     */
    public function defineDealMinimumPrice($minimumPrice) {
        if (!is_numeric($minimumPrice)) {
            throw new \InvalidArgumentException(sprintf('Expecting numeric received %s', gettype($minimumPrice)));
        }

        $this->minimumPrice = $minimumPrice;

        return $this;
    }

    public function process(\stdClass $response) {
        //var_dump($response);die;
        #$parsed = $response->parsed;
        $itineraries = $response->Itineraries;
        $cheaperItineraries = array_slice($itineraries, 0, static::MAX_PARSED_DEALS);

        $minPrice = 5000;
        $dealFound = false;
        $resultCount = 1;
        foreach ($cheaperItineraries as $itinerary) {
            echo 'Verifying itinerary #'. $resultCount++ . ' ';

            if (!isset($itinerary->PricingOptions[0])) {
                continue;
            }

            $price = $itinerary->PricingOptions[0]->Price;
            $deepLinkUrl = $itinerary->PricingOptions[0]->DeeplinkUrl;

            if ($price <= $minPrice) {
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
