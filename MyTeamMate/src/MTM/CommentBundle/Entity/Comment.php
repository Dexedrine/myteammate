<?php

namespace MTM\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MTM\LoginBundle\Entity\TeamMate ;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column( type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idcomment;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $contents;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datecomment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afficher", type="boolean", nullable=true)
     */
    private $visible;

    
    /**
     * @var \TeamMate
     *
     * @ORM\ManyToOne(targetEntity="MTM\LoginBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idreceiver", referencedColumnName="idteammate")
     * })
     */
    private $idreceiver;

    /**
     * @var \TeamMate
     *
     * @ORM\ManyToOne(targetEntity="MTM\LoginBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idposter", referencedColumnName="idteammate")
     * })
     */
    private $idposter;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="MTM\CommentBundle\Entity\TeamMate")
	 * @ORM\JoinTable(name="abusedcomment",
	 *   joinColumns={
	 * 	   @ORM\JoinColumn(name="idcomment", referencedColumnName="idcomment")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idteammate", referencedColumnName="idteammate")
	 *   }
	 * )
	 */
	private $abusedcomments;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->abusedcomments = new \Doctrine\Common\Collections\ArrayCollection();
	}
  
    
    /**  @ORM\PrePersist */
    function onPersist()
    {
    	$this->datecomment = new \DateTime('now');
    }

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
     * Set contents
     *
     * @param string $contents
     * @return Comment
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    
        return $this;
    }

    /**
     * Get contents
     *
     * @return string 
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Set datecomment
     *
     * @param \DateTime $datecomment
     * @return Comment
     */
    public function setDatecomment($datecomment)
    {
        $this->datecomment = $datecomment;
    
        return $this;
    }

    /**
     * Get datecomment
     *
     * @return \DateTime 
     */
    public function getDatecomment()
    {
        return $this->datecomment;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Comment
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    
        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set idreceiver
     *
     * @param \MTM\LoginBundle\Entity\TeamMate $idreceiver
     * @return Comment
     */
    public function setIdreceiver(\MTM\LoginBundle\Entity\TeamMate $idreceiver = null)
    {
        $this->idreceiver = $idreceiver;
    
        return $this;
    }

    /**
     * Get idreceiver
     *
     * @return \MTM\LoginBundle\Entity\TeamMate 
     */
    public function getIdreceiver()
    {
        return $this->idreceiver;
    }

    /**
     * Set idposter
     *
     * @param \MTM\LoginBundle\Entity\TeamMate $idposter
     * @return Comment
     */
    public function setIdposter(\MTM\LoginBundle\Entity\TeamMate $idposter = null)
    {
        $this->idposter = $idposter;
    
        return $this;
    }

    /**
     * Get idposter
     *
     * @return \MTM\LoginBundle\Entity\TeamMate
     */
    public function getIdposter()
    {
        return $this->idposter;
    }
}