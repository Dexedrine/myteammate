<?php

namespace MTM\SportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slot
 *
 * @ORM\Table(name="slot")
 * @ORM\Entity
 */
class Slot
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idslot;

    /**
     * @var integer
     *
     * @ORM\Column(type="time", nullable=true)
     */
    private $starthour;

    /**
     * @var integer
     *
     * @ORM\Column(type="time", nullable=true)
     */
    private $endhour;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=8, nullable=false)
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
     * @return Slot
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
     * @return Slot
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
     * @return Slot
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