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
 * @ORM\Entity
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
	
}
