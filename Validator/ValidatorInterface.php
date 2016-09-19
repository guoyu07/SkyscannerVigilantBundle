<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Validator;

interface ValidatorInterface
{
    /**
     * @param $instance
     * @return $this
     */
    public function setInstance($instance);

    /**
     * @throw ValidationException
     */
    public function validate();
}
