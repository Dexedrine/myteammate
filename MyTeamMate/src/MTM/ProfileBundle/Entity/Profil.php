<?php

namespace MTM\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MTM\LoginBundle\Entity\Utilisateur;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity
 */
class Profil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idprofil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="profil_idprofil_seq", allocationSize=1, initialValue=1)
     */
    private $idprofil;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=15, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=15, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=8, nullable=true)
     */
    private $login;

    /**
     * @var integer
     *
     * @ORM\Column(name="sexe", type="integer", nullable=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="urlphoto", type="string", length=80, nullable=true)
     */
    private $urlphoto;

    /**
     * @var \Utilisateur
     *
     * @ORM\OneToOne(targetEntity="MTM\LoginBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;



    /**
     * Get idprofil
     *
     * @return integer 
     */
    public function getIdprofil()
    {
        return $this->idprofil;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Profil
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Profil
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Profil
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set sexe
     *
     * @param integer $sexe
     * @return Profil
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    
        return $this;
    }

    /**
     * Get sexe
     *
     * @return integer 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set urlphoto
     *
     * @param string $urlphoto
     * @return Profil
     */
    public function setUrlphoto($urlphoto)
    {
        $this->urlphoto = $urlphoto;
    
        return $this;
    }

    /**
     * Get urlphoto
     *
     * @return string 
     */
    public function getUrlphoto()
    {
        return $this->urlphoto;
    }

    /**
     * Set idutilisateur
     *
     * @param Utilisateur $idutilisateur
     * @return Profil
     */
    public function setIdutilisateur(Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;
    
        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }
}