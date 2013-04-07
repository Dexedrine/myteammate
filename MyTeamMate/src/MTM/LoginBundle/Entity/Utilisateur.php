<?php

namespace MTM\LoginBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

use MTM\CommentBundle\Entity\Commentaire ;
use MTM\MessageBundle\Entity\Message ;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur implements UserInterface, \Serializable {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="idutilisateur", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="SEQUENCE")
	 * @ORM\SequenceGenerator(sequenceName="utilisateur_idutilisateur_seq", allocationSize=1, initialValue=1)
	 */
	private $idutilisateur;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="mail", type="string", length=80, nullable=true)
	 */
	private $mail;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="acceptusemail", type="boolean", nullable=true)
	 */
	private $acceptusemail;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="motdepasse", type="string", nullable=true)
	 */
	private $motdepasse;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="MTM\CommentBundle\Entity\Commentaire", inversedBy="idutilisateur")
	 * @ORM\JoinTable(name="abuscommentaire",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idcommentaire", referencedColumnName="idcommentaire")
	 *   }
	 * )
	 */
	private $idcommentaire;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="MTM\MessageBundle\Entity\Message", inversedBy="idutilisateur")
	 * @ORM\JoinTable(name="abusmessage",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="idmessage", referencedColumnName="idmessage")
	 *   }
	 * )
	 */
	private $idmessage;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->idcommentaire = new \Doctrine\Common\Collections\ArrayCollection();
		$this->idmessage = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get idutilisateur
	 *
	 * @return integer 
	 */
	public function getIdutilisateur() {
		return $this->idutilisateur;
	}

	/**
	 * Set mail
	 *
	 * @param string $mail
	 * @return Utilisateur
	 */
	public function setMail($mail) {
		$this->mail = $mail;

		return $this;
	}

	/**
	 * Get mail
	 *
	 * @return string 
	 */
	public function getMail() {
		return $this->mail;
	}

	/**
	 * Set acceptusemail
	 *
	 * @param bool $acceptusemail
	 * @return Utilisateur
	 */
	public function setAcceptusemail($acceptusemail) {
		$this->acceptusemail = $acceptusemail;

		return $this;
	}

	/**
	 * Get acceptusemail
	 *
	 * @return bool 
	 */
	public function getAcceptusemail() {
		return $this->acceptusemail;
	}

	/**
	 * Set motdepasse
	 *
	 * @param string $motdepasse
	 * @return Utilisateur
	 */
	public function setMotdepasse($motdepasse) {
		$this->motdepasse = $motdepasse;

		return $this;
	}

	/**
	 * Get motdepasse
	 *
	 * @return string 
	 */
	public function getMotdepasse() {
		return $this->motdepasse;
	}

	/**
	 * Add idcommentaire
	 *
	 * @param Commentaire $idcommentaire
	 * @return Utilisateur
	 */
	public function addIdcommentaire(
			Commentaire $idcommentaire) {
		$this->idcommentaire[] = $idcommentaire;

		return $this;
	}

	/**
	 * Remove idcommentaire
	 *
	 * @param Commentaire $idcommentaire
	 */
	public function removeIdcommentaire(
			Commentaire $idcommentaire) {
		$this->idcommentaire->removeElement($idcommentaire);
	}

	/**
	 * Get idcommentaire
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getIdcommentaire() {
		return $this->idcommentaire;
	}

	/**
	 * Add idmessage
	 *
	 * @param Message $idmessage
	 * @return Utilisateur
	 */
	public function addIdmessage(Message $idmessage) {
		$this->idmessage[] = $idmessage;

		return $this;
	}

	/**
	 * Remove idmessage
	 *
	 * @param Message $idmessage
	 */
	public function removeIdmessage(Message $idmessage) {
		$this->idmessage->removeElement($idmessage);
	}

	/**
	 * Get idmessage
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getIdmessage() {
		return $this->idmessage;
	}

	/**
	 * @inheritDoc
	 */
	public function getRoles() {
		return array('ROLE_USER');
	}
	public function getPassword() {
		return $this->motdepasse;

	}
	public function getUsername() {
		return $this->mail;

	}
	public function eraseCredentials() {

	}

	/**
	 * @see \Serializable::serialize()
	 */
	public function serialize() {
		return serialize(array($this->idutilisateur,));
	}

	/**
	 * @see \Serializable::unserialize()
	 */
	public function unserialize($serialized) {
		list($this->idutilisateur, ) = unserialize($serialized);
	}
	public function getSalt() {
		// TODO: Auto-generated method stub

	}

}
