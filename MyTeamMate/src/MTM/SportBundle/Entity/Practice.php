<?php

namespace MTM\SportBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
use MTM\LoginBundle\Entity\TeamMate ;


/**
 * Practice
 *
 * @ORM\Table(name="practice")
 * @ORM\Entity
 */
class Practice
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="idpractice", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $idpractice;
	
	/**
     * @var \Place
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idplace", referencedColumnName="idplace")
     * })
     */
    private $idplace;

    /**
     * @var \Level
     * 
     * 
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Level")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idlevel", referencedColumnName="idlevel")
     * })
     */
    private $idlevel;

    /**
     * @var \TeamMate
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="MTM\LoginBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idteammate", referencedColumnName="idteammate")
     * })
     */
    private $iduser;

    /**
     * @var \Sport
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsport", referencedColumnName="idsport")
     * })
     */
    private $idsport;

    /**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="Slot")
	 * @ORM\JoinTable(name="practicesslots",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="idpractice", referencedColumnName="idpractice")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idslot", referencedColumnName="idslot")
	 *   }
	 * )
	 */
    private $idslots;
    
    /**
     * Constructor
     */
    public function __construct() {
    	$this->idslots = new \Doctrine\Common\Collections\ArrayCollection();
    }





    /**
     * Get idpractice
     *
     * @return integer 
     */
    public function getIdpractice()
    {
        return $this->idpractice;
    }

    /**
     * Set idplace
     *
     * @param \MTM\SportBundle\Entity\Place $idplace
     * @return Practice
     */
    public function setIdplace(\MTM\SportBundle\Entity\Place $idplace = null)
    {
        $this->idplace = $idplace;
    
        return $this;
    }

    /**
     * Get idplace
     *
     * @return \MTM\SportBundle\Entity\Place 
     */
    public function getIdplace()
    {
        return $this->idplace;
    }

    /**
     * Set idlevel
     *
     * @param \MTM\SportBundle\Entity\Level $idlevel
     * @return Practice
     */
    public function setIdlevel(\MTM\SportBundle\Entity\Level $idlevel = null)
    {
        $this->idlevel = $idlevel;
    
        return $this;
    }

    /**
     * Get idlevel
     *
     * @return \MTM\SportBundle\Entity\Level 
     */
    public function getIdlevel()
    {
        return $this->idlevel;
    }

    /**
     * Set iduser
     *
     * @param \MTM\LoginBundle\Entity\TeamMate $iduser
     * @return Practice
     */
    public function setIduser(\MTM\LoginBundle\Entity\TeamMate $iduser = null)
    {
        $this->iduser = $iduser;
    
        return $this;
    }

    /**
     * Get iduser
     *
     * @return \MTM\LoginBundle\Entity\TeamMate 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idsport
     *
     * @param \MTM\SportBundle\Entity\Sport $idsport
     * @return Practice
     */
    public function setIdsport(\MTM\SportBundle\Entity\Sport $idsport = null)
    {
        $this->idsport = $idsport;
    
        return $this;
    }

    /**
     * Get idsport
     *
     * @return \MTM\SportBundle\Entity\Sport 
     */
    public function getIdsport()
    {
        return $this->idsport;
    }

    /**
     * Add idslots
     *
     * @param \MTM\SportBundle\Entity\Slot $idslots
     * @return Practice
     */
    public function addIdslot(\MTM\SportBundle\Entity\Slot $idslots)
    {
        $this->idslots[] = $idslots;
    
        return $this;
    }

    /**
     * Remove idslots
     *
     * @param \MTM\SportBundle\Entity\Slot $idslots
     */
    public function removeIdslot(\MTM\SportBundle\Entity\Slot $idslots)
    {
        $this->idslots->removeElement($idslots);
    }

    /**
     * Get idslots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdslots()
    {
        return $this->idslots;
    }
}