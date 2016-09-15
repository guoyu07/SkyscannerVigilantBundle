<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Api\DataTransfer;

use Jeancsil\Skyscanner\VigilantBundle\Entity\Parameter;
use Symfony\Component\Console\Input\InputInterface;

class TravelOptionsFactory
{
    /**
     * @param InputInterface $input
     * @return TravelOptions
     */
    public function createFromInput(InputInterface $input) {
        $options = new TravelOptions();
//        $options->country = $input->getArgument(Parameter::)
        $options->originPlace = $input->getOption(Parameter::FROM);
        $options->destinationPlace = $input->getOption(Parameter::TO);
        $options->outboundDate =  new \DateTime($input->getOption(Parameter::DEPARTURE_DATE));
        $options->inboundDate = new \DateTime($input->getOption(Parameter::RETURN_DATE));

        return $options;
    }
}
