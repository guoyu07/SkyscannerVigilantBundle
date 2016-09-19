<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Api\Flights;

use Jeancsil\Skyscanner\VigilantBundle\Api\DataTransfer\SessionParameters;
use Jeancsil\Skyscanner\VigilantBundle\Api\Http\TransportAwareTrait;

class LivePrice
{
    use TransportAwareTrait;

    public function getDeals(SessionParameters $parameters) {
        return $this->transport->findQuotes($parameters);
    }
}
