<?php

namespace MTM\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MTM\CoreBundle\Entity\TeamMate ;
use FOS\CommentBundle\Entity\Comment as BaseComment;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment
{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Thread of this comment
	 *
	 * @var Thread
	 * @ORM\ManyToOne(targetEntity="MTM\CommentBundle\Entity\Thread")
	 */
	protected $thread;

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
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idreceiver", referencedColumnName="id")
     * })
     */
    private $idreceiver;

    /**
     * @var \TeamMate
     *
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idposter", referencedColumnName="id")
     * })
     */
    private $idposter;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="MTM\CoreBundle\Entity\TeamMate")
	 * @ORM\JoinTable(name="abusedcomment",
	 *   joinColumns={
	 * 	   @ORM\JoinColumn(name="id", referencedColumnName="id")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idteammate", referencedColumnName="id")
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
    public function getId()
    {
        return $this->id;
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

    /**
     * Set idposter
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $idposter
     * @return Comment
     */
    public function setIdposter(\MTM\CoreBundle\Entity\TeamMate $idposter = null)
    {
        $this->idposter = $idposter;
    
        return $this;
    }

    /**
     * Get idposter
     *
     * @return \MTM\CoreBundle\Entity\TeamMate
     */
    public function getIdposter()
    {
        return $this->idposter;
    }
}