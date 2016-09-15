<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Api\Flights;

use Jeancsil\Skyscanner\VigilantBundle\Api\DataTransfer\SessionParametersFactory;
use Jeancsil\Skyscanner\VigilantBundle\Api\Http\TransportAwareTrait;
use Symfony\Component\Console\Input\Input;

class LivePrice
{
    use TransportAwareTrait;

    private $sessionParametersFactory;

    public function __construct(SessionParametersFactory $sessionParametersFactory) {
        $this->sessionParametersFactory = $sessionParametersFactory;
    }

    public function getDeals(Input $input) {
        $parameters = $this->sessionParametersFactory->createFromInput($input);

        return $this->transport->findQuotes($parameters);
    }
}
