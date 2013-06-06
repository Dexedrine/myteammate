<?php

namespace MTM\LoginBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

use MTM\CommentBundle\Entity\Comment ;
use MTM\MessageBundle\Entity\Message ;

/**
 * TeamMate
 *
 * @ORM\Table(name="teammate")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class TeamMate implements UserInterface, \Serializable {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="idteammate", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $idteammate;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=80, nullable=true)
	 */
	private $email;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="acceptusemail", type="boolean", nullable=true)
	 */
	private $acceptusemail;
	
	/**
	 * @var string
	 * 
	 * @ORM\Column(type="string", length=32 , nullable=true)
	 */
	private $salt;
	
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=40)
	 */
	private $password;

	
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
	public function getPassword() {
		return $this->password;
	}
	public function getUsername() {
		return $this->email;
	}
	public function eraseCredentials() {

	}
	/**
	 * @see \Serializable::serialize()
	 */
	public function serialize() {
		return serialize(array($this->idteammate,));
	}

	/**
	 * @see \Serializable::unserialize()
	 */
	public function unserialize($serialized) {
		list($this->idteammate, ) = unserialize($serialized);
	}
	


    /**
     * Get idteammate
     *
     * @return integer 
     */
    public function getIdteammate()
    {
        return $this->idteammate;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return TeamMate
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set acceptusemail
     *
     * @param boolean $acceptusemail
     * @return TeamMate
     */
    public function setAcceptusemail($acceptusemail)
    {
        $this->acceptusemail = $acceptusemail;
    
        return $this;
    }

    /**
     * Get acceptusemail
     *
     * @return boolean 
     */
    public function getAcceptusemail()
    {
        return $this->acceptusemail;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return TeamMate
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Add idabusedcomments
     *
     * @param \MTM\CommentBundle\Entity\Comment $idabusedcomments
     * @return TeamMate
     */
    public function addIdabusedcomment(\MTM\CommentBundle\Entity\Comment $idabusedcomments)
    {
        $this->idabusedcomments[] = $idabusedcomments;
    
        return $this;
    }

    /**
     * Remove idabusedcomments
     *
     * @param \MTM\CommentBundle\Entity\Comment $idabusedcomments
     */
    public function removeIdabusedcomment(\MTM\CommentBundle\Entity\Comment $idabusedcomments)
    {
        $this->idabusedcomments->removeElement($idabusedcomments);
    }

    /**
     * Get idabusedcomments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdabusedcomments()
    {
        return $this->idabusedcomments;
    }

    /**
     * Add idabusedmessages
     *
     * @param \MTM\MessageBundle\Entity\Message $idabusedmessages
     * @return TeamMate
     */
    public function addIdabusedmessage(\MTM\MessageBundle\Entity\Message $idabusedmessages)
    {
        $this->idabusedmessages[] = $idabusedmessages;
    
        return $this;
    }

    /**
     * Remove idabusedmessages
     *
     * @param \MTM\MessageBundle\Entity\Message $idabusedmessages
     */
    public function removeIdabusedmessage(\MTM\MessageBundle\Entity\Message $idabusedmessages)
    {
        $this->idabusedmessages->removeElement($idabusedmessages);
    }

    /**
     * Get idabusedmessages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdabusedmessages()
    {
        return $this->idabusedmessages;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return TeamMate
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }
}