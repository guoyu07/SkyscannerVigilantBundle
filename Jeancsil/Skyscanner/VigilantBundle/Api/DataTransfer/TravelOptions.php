<?php
/**
 * @author Jean Silva <jeancsil@gmail.com>
 * @license MIT
 */
namespace Jeancsil\Skyscanner\VigilantBundle\Api\DataTransfer;

class TravelOptions {
    /**
     * @var string
     */
    public $country;
    
    /**
     * @var string
     */
    public $currency;
    
    /**
     * @var string
     */
    public $locale;
    
    /**
     * @var string
     */
    public $originPlace;
    
    /**
     * @var string
     */
    public $destinationPlace;
    
    /**
     * @var \DateTime
     */
    public $outboundDate;
    
    /**
     * @var \DateTime
     */
    public $inboundDate;
    
    /**
     * @var integer
     */
    public $adults;
    
    /**
     * @var string
     */
    public $locationSchema;
    
    /**
     * @var string
     */
    public $cabinClass;
    
    /**
     * @var integer
     */
    public $children;
    
    /**
     * @var integer
     */
    public $infants;
    
    /**
     * @var boolean
     */
    public $groupPricing;
}
