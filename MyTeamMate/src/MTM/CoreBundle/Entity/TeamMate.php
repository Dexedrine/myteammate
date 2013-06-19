<?php

namespace MTM\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;
use MTM\CommentBundle\Entity\Comment;
use MTM\MessageBundle\Entity\Message;
use MTM\ProfileBundle\Entity\Profile;
use MTM\SportBundle\Entity\Practice;

use FOS\UserBundle\Model\User as BaseUser;
/**
 * TeamMate
 * 
 * @ORM\Table(name="teammate")
 * @ORM\Entity(repositoryClass="MTM\CoreBundle\Repository\TeamMateRepository")
 * @ORM\HasLifecycleCallbacks
 */
class TeamMate extends BaseUser  implements ParticipantInterface{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	public function __construct()
		{
		parent::__construct();
		$this->practices = new \Doctrine\Common\Collections\ArrayCollection();
		$this->comments = new \Doctrine\Common\Collections\ArrayCollection();
		$this->favorites = new \Doctrine\Common\Collections\ArrayCollection();	
		}
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="acceptusemail", type="boolean", nullable=true)
	 */
	private $acceptusemail;
	
	/**
	 * @var Profile
	 * 
	 @ORM\OneToOne(targetEntity="MTM\ProfileBundle\Entity\Profile",cascade={"remove"})
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="idprofile", referencedColumnName="idprofile")
	 * })
	 */
	private $profile;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="MTM\SportBundle\Entity\Practice",cascade={"remove"})
	 * @ORM\JoinTable(name="teammatepractices",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="idteammate", referencedColumnName="id")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idpractice", referencedColumnName="idpractice")
	 *   }
	 * )
	 */
	private $practices;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="MTM\CommentBundle\Entity\Comment")
	 * @ORM\JoinTable(name="teammatecomments",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="idteammate", referencedColumnName="id" )
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idcomment", referencedColumnName="idcomment")
	 *   }
	 * )
	 */
	private $comments;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="TeamMate")
	 * @ORM\JoinTable(name="favorites",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="idteammate", referencedColumnName="id" )
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idfavorite", referencedColumnName="id")
	 *   }
	 * )
	 */
	private $favorites;
	
	/**
	 * Set acceptusemail
	 *
	 * @param boolean $acceptusemail
	 * @return TeamMate
	 */
	public function setAcceptusemail($acceptusemail) {
		$this->acceptusemail = $acceptusemail;
		
		return $this;
	}
	
	/**
	 * Get acceptusemail
	 *
	 * @return boolean
	 */
	public function getAcceptusemail() {
		return $this->acceptusemail;
	}
	
	public function getId(){
		return $this->id;
	}
	
	
	/**
	 * Set profile
	 *
	 * @param \MTM\ProfileBundle\Entity\Profile $profile
	 * @return TeamMate
	 */
	public function setProfile(\MTM\ProfileBundle\Entity\Profile $profile = null)
		{
		$this->profile = $profile;
		
		return $this;
		}
	
	/**
	 * Get profile
	 *
	 * @return \MTM\ProfileBundle\Entity\Profile 
	 */
	public function getProfile()
		{
		return $this->profile;
		}
	
	/**
	 * Add practices
	 *
	 * @param \MTM\SportBundle\Entity\Practice $practices
	 * @return TeamMate
	 */
	public function addPractice(\MTM\SportBundle\Entity\Practice $practices)
		{
		$this->practices[] = $practices;
		
		return $this;
		}
	
	/**
	 * Remove practices
	 *
	 * @param \MTM\SportBundle\Entity\Practice $practices
	 */
	public function removePractice(\MTM\SportBundle\Entity\Practice $practices)
		{
		$this->practices->removeElement($practices);
		}
	
	/**
	 * Get practices
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getPractices()
		{
		return $this->practices;
		}

    /**
     * Add comments
     *
     * @param \MTM\CommentBundle\Entity\Comment $comments
     * @return TeamMate
     */
    public function addComment(\MTM\CommentBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \MTM\CommentBundle\Entity\Comment $comments
     */
    public function removeComment(\MTM\CommentBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add favorites
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $favorites
     * @return TeamMate
     */
    public function addFavorite(\MTM\CoreBundle\Entity\TeamMate $favorites)
    {
        $this->favorites[] = $favorites;

        return $this;
    }

    /**
     * Remove favorites
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $favorites
     */
    public function removeFavorite(\MTM\CoreBundle\Entity\TeamMate $favorites)
    {
        $this->favorites->removeElement($favorites);
    }

    /**
     * Get favorites
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFavorites()
    {
        return $this->favorites;
    }
}
