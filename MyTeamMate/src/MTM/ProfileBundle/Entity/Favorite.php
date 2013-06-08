<?php

namespace MTM\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MTM\CoreBundle\Entity\TeamMate ;

/**
 * Favorite
 *
 * @ORM\Table(name="favorite")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Favorite
{
    /**
     * @var integer
     *
     * @ORM\Column( type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idfavori;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datefavorite;

    /**
     * @var \TeamMate
     *
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmaker", referencedColumnName="id")
     * })
     */
    private $idmaker;

    /**
     * @var \TeamMate
     *
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtarget", referencedColumnName="id")
     * })
     */
    private $idtarget;
    
    /**  @ORM\PrePersist */
    function onPersist()
    {
    	$this->datefavorite = new \DateTime('now');
    }


    /**
     * Get idfavori
     *
     * @return integer 
     */
    public function getIdfavori()
    {
        return $this->idfavori;
    }

    /**
     * Set datefavorite
     *
     * @param \DateTime $datefavorite
     * @return Favorite
     */
    public function setDatefavorite($datefavorite)
    {
        $this->datefavorite = $datefavorite;
    
        return $this;
    }

    /**
     * Get datefavorite
     *
     * @return \DateTime 
     */
    public function getDatefavorite()
    {
        return $this->datefavorite;
    }

    /**
     * Set idmaker
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $idmaker
     * @return Favorite
     */
    public function setIdmaker(\MTM\CoreBundle\Entity\TeamMate $idmaker = null)
    {
        $this->idmaker = $idmaker;
    
        return $this;
    }

    /**
     * Get idmaker
     *
     * @return \MTM\CoreBundle\Entity\TeamMate 
     */
    public function getIdmaker()
    {
        return $this->idmaker;
    }

    /**
     * Set idtarget
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $idtarget
     * @return Favorite
     */
    public function setIdtarget(\MTM\CoreBundle\Entity\TeamMate $idtarget = null)
    {
        $this->idtarget = $idtarget;
    
        return $this;
    }

    /**
     * Get idtarget
     *
     * @return \MTM\CoreBundle\Entity\TeamMate 
     */
    public function getIdtarget()
    {
        return $this->idtarget;
    }
}