<?php

namespace Acme\MtmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToOne(targetEntity="Utilisateur")
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
     * @param \Acme\MtmBundle\Entity\Lieu $idlieu
     * @return Pratique
     */
    public function setIdlieu(\Acme\MtmBundle\Entity\Lieu $idlieu)
    {
        $this->idlieu = $idlieu;
    
        return $this;
    }

    /**
     * Get idlieu
     *
     * @return \Acme\MtmBundle\Entity\Lieu 
     */
    public function getIdlieu()
    {
        return $this->idlieu;
    }

    /**
     * Set idniveau
     *
     * @param \Acme\MtmBundle\Entity\Niveau $idniveau
     * @return Pratique
     */
    public function setIdniveau(\Acme\MtmBundle\Entity\Niveau $idniveau = null)
    {
        $this->idniveau = $idniveau;
    
        return $this;
    }

    /**
     * Get idniveau
     *
     * @return \Acme\MtmBundle\Entity\Niveau 
     */
    public function getIdniveau()
    {
        return $this->idniveau;
    }

    /**
     * Set idutilisateur
     *
     * @param \Acme\MtmBundle\Entity\Utilisateur $idutilisateur
     * @return Pratique
     */
    public function setIdutilisateur(\Acme\MtmBundle\Entity\Utilisateur $idutilisateur)
    {
        $this->idutilisateur = $idutilisateur;
    
        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \Acme\MtmBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set idsport
     *
     * @param \Acme\MtmBundle\Entity\Sport $idsport
     * @return Pratique
     */
    public function setIdsport(\Acme\MtmBundle\Entity\Sport $idsport)
    {
        $this->idsport = $idsport;
    
        return $this;
    }

    /**
     * Get idsport
     *
     * @return \Acme\MtmBundle\Entity\Sport 
     */
    public function getIdsport()
    {
        return $this->idsport;
    }

    /**
     * Set idcreneau
     *
     * @param \Acme\MtmBundle\Entity\Creneau $idcreneau
     * @return Pratique
     */
    public function setIdcreneau(\Acme\MtmBundle\Entity\Creneau $idcreneau)
    {
        $this->idcreneau = $idcreneau;
    
        return $this;
    }

    /**
     * Get idcreneau
     *
     * @return \Acme\MtmBundle\Entity\Creneau 
     */
    public function getIdcreneau()
    {
        return $this->idcreneau;
    }
}