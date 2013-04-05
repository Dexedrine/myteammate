<?php

namespace Acme\MtmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
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
     * @var integer
     *
     * @ORM\Column(name="acceptusemail", type="integer", nullable=true)
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
     * @ORM\ManyToMany(targetEntity="Commentaire", inversedBy="idutilisateur")
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
     * @ORM\ManyToMany(targetEntity="Message", inversedBy="idutilisateur")
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
     * @var \Profil
     *
     * @ORM\ManyToOne(targetEntity="Profil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprofil", referencedColumnName="idprofil")
     * })
     */
    private $idprofil;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcommentaire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idmessage = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idutilisateur
     *
     * @return integer 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Utilisateur
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set acceptusemail
     *
     * @param integer $acceptusemail
     * @return Utilisateur
     */
    public function setAcceptusemail($acceptusemail)
    {
        $this->acceptusemail = $acceptusemail;
    
        return $this;
    }

    /**
     * Get acceptusemail
     *
     * @return integer 
     */
    public function getAcceptusemail()
    {
        return $this->acceptusemail;
    }

    /**
     * Set motdepasse
     *
     * @param string $motdepasse
     * @return Utilisateur
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    
        return $this;
    }

    /**
     * Get motdepasse
     *
     * @return string 
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * Add idcommentaire
     *
     * @param \Acme\MtmBundle\Entity\Commentaire $idcommentaire
     * @return Utilisateur
     */
    public function addIdcommentaire(\Acme\MtmBundle\Entity\Commentaire $idcommentaire)
    {
        $this->idcommentaire[] = $idcommentaire;
    
        return $this;
    }

    /**
     * Remove idcommentaire
     *
     * @param \Acme\MtmBundle\Entity\Commentaire $idcommentaire
     */
    public function removeIdcommentaire(\Acme\MtmBundle\Entity\Commentaire $idcommentaire)
    {
        $this->idcommentaire->removeElement($idcommentaire);
    }

    /**
     * Get idcommentaire
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcommentaire()
    {
        return $this->idcommentaire;
    }

    /**
     * Add idmessage
     *
     * @param \Acme\MtmBundle\Entity\Message $idmessage
     * @return Utilisateur
     */
    public function addIdmessage(\Acme\MtmBundle\Entity\Message $idmessage)
    {
        $this->idmessage[] = $idmessage;
    
        return $this;
    }

    /**
     * Remove idmessage
     *
     * @param \Acme\MtmBundle\Entity\Message $idmessage
     */
    public function removeIdmessage(\Acme\MtmBundle\Entity\Message $idmessage)
    {
        $this->idmessage->removeElement($idmessage);
    }

    /**
     * Get idmessage
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdmessage()
    {
        return $this->idmessage;
    }

    /**
     * Set idprofil
     *
     * @param \Acme\MtmBundle\Entity\Profil $idprofil
     * @return Utilisateur
     */
    public function setIdprofil(\Acme\MtmBundle\Entity\Profil $idprofil = null)
    {
        $this->idprofil = $idprofil;
    
        return $this;
    }

    /**
     * Get idprofil
     *
     * @return \Acme\MtmBundle\Entity\Profil 
     */
    public function getIdprofil()
    {
        return $this->idprofil;
    }
}