<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Validator;

use Jeancsil\Skyscanner\VigilantBundle\Entity\Parameter;
use Symfony\Component\Console\Input\InputInterface;

class CommandLineParameterValidator implements ValidatorInterface
{
    /**
     * @var InputInterface
     */
    private $input;

    /**
     * @param $instance
     * @return $this
     */
    public function setInstance($instance) {
        if (!$instance instanceof InputInterface) {
            throw new \LogicException(
                sprintf('$instance must be instance of InputInterface. %s given', $instance)
            );
        }

        $this->input = $instance;

        return $this;
    }

    /**
     * TODO validate all fields
     * @throw ValidationException
     */
    public function validate() {
        $this->input->getOption(Parameter::FROM);
        $this->input->getOption(Parameter::TO);
        $this->input->getOption(Parameter::DEPARTURE_DATE);
        $this->input->getOption(Parameter::RETURN_DATE);
    }
}
