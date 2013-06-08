<?php

namespace MTM\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MTM\CoreBundle\Entity\TeamMate;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column( type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idnote;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=true)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column( type="datetime", nullable=true)
     */
    private $datenote;

    /**
     * @var \TeamMate
     *
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idrater", referencedColumnName="id")
     * })
     */
    private $idrater;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idnoted", referencedColumnName="id")
     * })
     */
    private $idnoted;
    
    /**  @ORM\PrePersist */
    function onPersist()
    {
    	$this->datenote = new \DateTime('now');
    }



    /**
     * Get idnote
     *
     * @return integer 
     */
    public function getIdnote()
    {
        return $this->idnote;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Note
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set datenote
     *
     * @param \DateTime $datenote
     * @return Note
     */
    public function setDatenote($datenote)
    {
        $this->datenote = $datenote;
    
        return $this;
    }

    /**
     * Get datenote
     *
     * @return \DateTime 
     */
    public function getDatenote()
    {
        return $this->datenote;
    }

    /**
     * Set idrater
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $idrater
     * @return Note
     */
    public function setIdrater(\MTM\CoreBundle\Entity\TeamMate $idrater = null)
    {
        $this->idrater = $idrater;
    
        return $this;
    }

    /**
     * Get idrater
     *
     * @return \MTM\CoreBundle\Entity\TeamMate 
     */
    public function getIdrater()
    {
        return $this->idrater;
    }

    /**
     * Set idnoted
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $idnoted
     * @return Note
     */
    public function setIdnoted(\MTM\CoreBundle\Entity\TeamMate $idnoted = null)
    {
        $this->idnoted = $idnoted;
    
        return $this;
    }

    /**
     * Get idnoted
     *
     * @return \MTM\CoreBundle\Entity\TeamMate 
     */
    public function getIdnoted()
    {
        return $this->idnoted;
    }
}