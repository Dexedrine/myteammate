<?php

namespace MTM\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MTM\CoreBundle\Entity\TeamMate;

/**
 * @ORM\Entity	                         	
 */
class Comment	
{
    /**
	 * @ORM\Id
	 * @ORM\Column(name="idcomment", type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $idcomment;
	
	/**
	 * 
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=4000, nullable=true)
     */
	private $body;
	
	/**
     * @var \TeamMate
     *
     * @ORM\OneToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsender", referencedColumnName="id")
     * })
     */
    private $idsender;
	 
	/**
     * @var \TeamMate
     *
     * @ORM\OneToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idreceiver", referencedColumnName="id")
     * })
     */
    private $idreceiver;
	

    /**
     * Get idcomment
     *
     * @return integer 
     */
    public function getIdcomment()
    {
        return $this->idcomment;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Comment
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
     * Set idsender
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $idsender
     * @return Comment
     */
    public function setIdsender(\MTM\CoreBundle\Entity\TeamMate $idsender = null)
    {
        $this->idsender = $idsender;

        return $this;
    }

    /**
     * Get idsender
     *
     * @return \MTM\CoreBundle\Entity\TeamMate 
     */
    public function getIdsender()
    {
        return $this->idsender;
    }

    /**
     * Set idreceiver
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $idreceiver
     * @return Comment
     */
    public function setIdreceiver(\MTM\CoreBundle\Entity\TeamMate $idreceiver = null)
    {
        $this->idreceiver = $idreceiver;

        return $this;
    }

    /**
     * Get idreceiver
     *
     * @return \MTM\CoreBundle\Entity\TeamMate 
     */
    public function getIdreceiver()
    {
        return $this->idreceiver;
    }
}
