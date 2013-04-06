<?php

namespace MTM\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MTM\LoginBundle\Entity\Utilisateur ;

/**
 * Favori
 *
 * @ORM\Table(name="favori")
 * @ORM\Entity
 */
class Favori
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idfavori", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="favori_idfavori_seq", allocationSize=1, initialValue=1)
     */
    private $idfavori;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefavori", type="datetime", nullable=true)
     */
    private $datefavori;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="MTM\LoginBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcreateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idcreateur;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="MTM\LoginBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcible", referencedColumnName="idutilisateur")
     * })
     */
    private $idcible;



    /**
     * Get idfavori
     *
     * @return integer 
     */
    public function getIdfavori()
    {
        return $this->idfavori;
    }

    /**
     * Set datefavori
     *
     * @param \DateTime $datefavori
     * @return Favori
     */
    public function setDatefavori($datefavori)
    {
        $this->datefavori = $datefavori;
    
        return $this;
    }

    /**
     * Get datefavori
     *
     * @return \DateTime 
     */
    public function getDatefavori()
    {
        return $this->datefavori;
    }

    /**
     * Set idcreateur
     *
     * @param Utilisateur $idcreateur
     * @return Favori
     */
    public function setIdcreateur(Utilisateur $idcreateur = null)
    {
        $this->idcreateur = $idcreateur;
    
        return $this;
    }

    /**
     * Get idcreateur
     *
     * @return Utilisateur 
     */
    public function getIdcreateur()
    {
        return $this->idcreateur;
    }

    /**
     * Set idcible
     *
     * @param Utilisateur $idcible
     * @return Favori
     */
    public function setIdcible(Utilisateur $idcible = null)
    {
        $this->idcible = $idcible;
    
        return $this;
    }

    /**
     * Get idcible
     *
     * @return Utilisateur 
     */
    public function getIdcible()
    {
        return $this->idcible;
    }
}