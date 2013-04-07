<?php

namespace MTM\SportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MTM\LoginBundle\Entity\Utilisateur ;


/**
 * Pratique
 *
 * @ORM\Table(name="pratique")
 * @ORM\Entity
 */
class Pratique
{
    /**
     * @var \Lieu
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Lieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idlieu", referencedColumnName="idlieu")
     * })
     */
    private $idlieu;

    /**
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idniveau", referencedColumnName="idniveau")
     * })
     */
    private $idniveau;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MTM\LoginBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;

    /**
     * @var \Sport
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Sport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsport", referencedColumnName="idsport")
     * })
     */
    private $idsport;

    /**
     * @var \Creneau
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Creneau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcreneau", referencedColumnName="idcreneau")
     * })
     */
    private $idcreneau;



    /**
     * Set idlieu
     *
     * @param Lieu $idlieu
     * @return Pratique
     */
    public function setIdlieu(Lieu $idlieu)
    {
        $this->idlieu = $idlieu;
    
        return $this;
    }

    /**
     * Get idlieu
     *
     * @return Lieu 
     */
    public function getIdlieu()
    {
        return $this->idlieu;
    }

    /**
     * Set idniveau
     *
     * @param Niveau $idniveau
     * @return Pratique
     */
    public function setIdniveau(Niveau $idniveau = null)
    {
        $this->idniveau = $idniveau;
    
        return $this;
    }

    /**
     * Get idniveau
     *
     * @return Niveau 
     */
    public function getIdniveau()
    {
        return $this->idniveau;
    }

    /**
     * Set idutilisateur
     *
     * @param Utilisateur $idutilisateur
     * @return Pratique
     */
    public function setIdutilisateur(Utilisateur $idutilisateur)
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

    /**
     * Set idsport
     *
     * @param Sport $idsport
     * @return Pratique
     */
    public function setIdsport(Sport $idsport)
    {
        $this->idsport = $idsport;
    
        return $this;
    }

    /**
     * Get idsport
     *
     * @return Sport 
     */
    public function getIdsport()
    {
        return $this->idsport;
    }

    /**
     * Set idcreneau
     *
     * @param Creneau $idcreneau
     * @return Pratique
     */
    public function setIdcreneau(Creneau $idcreneau)
    {
        $this->idcreneau = $idcreneau;
    
        return $this;
    }

    /**
     * Get idcreneau
     *
     * @return Creneau 
     */
    public function getIdcreneau()
    {
        return $this->idcreneau;
    }
}