<?php

namespace MTM\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idnote", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="note_idnote_seq", allocationSize=1, initialValue=1)
     */
    private $idnote;

    /**
     * @var integer
     *
     * @ORM\Column(name="valeur", type="integer", nullable=true)
     */
    private $valeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenotation", type="datetime", nullable=true)
     */
    private $datenotation;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur_donnenote", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateurDonnenote;



    /**
     * Get idnote
     *
     * @return integer 
     */
    public function getIdnote()
    {
        return $this->idnote;
    }

    /**
     * Set valeur
     *
     * @param integer $valeur
     * @return Note
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    
        return $this;
    }

    /**
     * Get valeur
     *
     * @return integer 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set datenotation
     *
     * @param \DateTime $datenotation
     * @return Note
     */
    public function setDatenotation($datenotation)
    {
        $this->datenotation = $datenotation;
    
        return $this;
    }

    /**
     * Get datenotation
     *
     * @return \DateTime 
     */
    public function getDatenotation()
    {
        return $this->datenotation;
    }

    /**
     * Set idutilisateur
     *
     * @param Utilisateur $idutilisateur
     * @return Note
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

    /**
     * Set idutilisateurDonnenote
     *
     * @param Utilisateur $idutilisateurDonnenote
     * @return Note
     */
    public function setIdutilisateurDonnenote(Utilisateur $idutilisateurDonnenote = null)
    {
        $this->idutilisateurDonnenote = $idutilisateurDonnenote;
    
        return $this;
    }

    /**
     * Get idutilisateurDonnenote
     *
     * @return Utilisateur 
     */
    public function getIdutilisateurDonnenote()
    {
        return $this->idutilisateurDonnenote;
    }
}