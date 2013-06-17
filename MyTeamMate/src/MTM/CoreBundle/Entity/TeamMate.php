<?php

namespace MTM\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;
use MTM\CommentBundle\Entity\Comment;
use MTM\MessageBundle\Entity\Message;

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
	/**
	 * @var \Profile
	 *
	 * @ORM\OneToOne(targetEntity="MTM\ProfileBundle\Entity\Profile")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="idprofile", referencedColumnName="idprofile")
	 * })
	 */
	
	private $idprofile;
	public function __construct()
		{
		parent::__construct();
		// your own logic
		}
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="acceptusemail", type="boolean", nullable=true)
	 */
	private $acceptusemail;
	
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
	 * Set idteammate
	 *
	 * @param \MTM\ProfileBundle\Entity\Profile $idprofile
	 * @return Profile
	 */
	public function setIdprofile(\MTM\ProfileBundle\Entity\Profile $idprofile = null)
	{
		$this->idprofile = $idprofile;
	
		return $this;
	}
	/**
	 * Get idteammate
	 *
	 * @return \MTM\ProfileBundle\Entity\Profile $idprofile
	 */
	public function getIdprofile()
	{
		return $this->idprofile;
	}

}
