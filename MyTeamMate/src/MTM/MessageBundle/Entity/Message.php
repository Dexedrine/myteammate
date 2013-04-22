<?php

namespace MTM\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MTM\LoginBundle\Entity\TeamMate ; 

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idmessage;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datemessage;

    /**
     * @var integer
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isread;

 
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\ManyToMany(targetEntity="MTM\LoginBundle\Entity\TeamMate")
     * 	@ORM\JoinTable(name="messagesreceivers",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idmessage", referencedColumnName="idmessage")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idreceive", referencedColumnName="idteammate")
     *   }
     * )
     * 
     */
    private $idreceive;


    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MTM\LoginBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsender", referencedColumnName="idteammate")
     * })
     */
    private $idsender;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idreceive = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /** @ORM\PrePersist */
    function onPersist()
    {
    	$this->datemessage = new \DateTime('now');
    }

    

    /**
     * Get idmessage
     *
     * @return integer 
     */
    public function getIdmessage()
    {
        return $this->idmessage;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Message
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set datemessage
     *
     * @param \DateTime $datemessage
     * @return Message
     */
    public function setDatemessage($datemessage)
    {
        $this->datemessage = $datemessage;
    
        return $this;
    }

    /**
     * Get datemessage
     *
     * @return \DateTime 
     */
    public function getDatemessage()
    {
        return $this->datemessage;
    }

    /**
     * Set isread
     *
     * @param boolean $isread
     * @return Message
     */
    public function setIsread($isread)
    {
        $this->isread = $isread;
    
        return $this;
    }

    /**
     * Get isread
     *
     * @return boolean 
     */
    public function getIsread()
    {
        return $this->isread;
    }

    /**
     * Add idreceive
     *
     * @param \MTM\LoginBundle\Entity\TeamMate $idreceive
     * @return Message
     */
    public function addIdreceiver(\MTM\LoginBundle\Entity\TeamMate $idreceive)
    {
        $this->idreceive[] = $idreceive;
    
        return $this;
    }

    /**
     * Remove idreceive
     *
     * @param \MTM\LoginBundle\Entity\TeamMate $idreceive
     */
    public function removeIdreceiver(\MTM\LoginBundle\Entity\TeamMate $idreceive)
    {
        $this->idreceive->removeElement($idreceive);
    }

    /**
     * Get idreceive
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getidreceive()
    {
        return $this->idreceive;
    }

    /**
     * Set idsender
     *
     * @param \MTM\LoginBundle\Entity\TeamMate $idsender
     * @return Message
     */
    public function setIdsender(\MTM\LoginBundle\Entity\TeamMate $idsender = null)
    {
        $this->idsender = $idsender;
    
        return $this;
    }

    /**
     * Get idsender
     *
     * @return \MTM\LoginBundle\Entity\TeamMate 
     */
    public function getIdsender()
    {
        return $this->idsender;
    }
}