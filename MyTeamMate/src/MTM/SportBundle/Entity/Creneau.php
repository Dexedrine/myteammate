<?php

namespace MTM\SportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creneau
 */
class Creneau
{
    /**
     * @var integer
     */
    private $idslot;

    /**
     * @var \DateTime
     */
    private $starthour;

    /**
     * @var \DateTime
     */
    private $endhour;

    /**
     * @var string
     */
    private $day;


    /**
     * Get idslot
     *
     * @return integer 
     */
    public function getIdslot()
    {
        return $this->idslot;
    }

    /**
     * Set starthour
     *
     * @param \DateTime $starthour
     * @return Creneau
     */
    public function setStarthour($starthour)
    {
        $this->starthour = $starthour;
    
        return $this;
    }

    /**
     * Get starthour
     *
     * @return \DateTime 
     */
    public function getStarthour()
    {
        return $this->starthour;
    }

    /**
     * Set endhour
     *
     * @param \DateTime $endhour
     * @return Creneau
     */
    public function setEndhour($endhour)
    {
        $this->endhour = $endhour;
    
        return $this;
    }

    /**
     * Get endhour
     *
     * @return \DateTime 
     */
    public function getEndhour()
    {
        return $this->endhour;
    }

    /**
     * Set day
     *
     * @param string $day
     * @return Creneau
     */
    public function setDay($day)
    {
        $this->day = $day;
    
        return $this;
    }

    /**
     * Get day
     *
     * @return string 
     */
    public function getDay()
    {
        return $this->day;
    }
}
