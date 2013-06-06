<?php

namespace MTM\LoginBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
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
class TeamMate extends BaseUser implements UserInterface, \Serializable,
		ParticipantInterface {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	public function __construct() {
		parent::__construct();
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

	public function getId() {
		return $this->id;

	}
	public function getIdTeamMate() {
		return $this->id;

	}

	/**
	 * @ORM\PrePersist
	 */
	public function encodePassword() {
		//$this->salt = md5($this->password);
		$this->password = sha1($this->password);
	}
	/**
	 * @inheritDoc
	 */
	public function getRoles() {
		return array('ROLE_USER');
	}
	public function getSalt() {
		return $this->salt;
	}
	public function eraseCredentials() {

	}




}
