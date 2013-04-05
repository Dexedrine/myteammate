<?php

namespace Acme\MtmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcommentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="commentaire_idcommentaire_seq", allocationSize=1, initialValue=1)
     */
    private $idcommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", nullable=true)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecommentaire", type="datetime", nullable=true)
     */
    private $datecommentaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="afficher", type="integer", nullable=true)
     */
    private $afficher;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="idcommentaire")
     */
    private $idutilisateur;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddestinataire", referencedColumnName="idutilisateur")
     * })
     */
    private $iddestinataire;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idexpediteur", referencedColumnName="idutilisateur")
     * })
     */
    private $idexpediteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idutilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idcommentaire
     *
     * @return integer 
     */
    public function getIdcommentaire()
    {
        return $this->idcommentaire;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set datecommentaire
     *
     * @param \DateTime $datecommentaire
     * @return Commentaire
     */
    public function setDatecommentaire($datecommentaire)
    {
        $this->datecommentaire = $datecommentaire;
    
        return $this;
    }

    /**
     * Get datecommentaire
     *
     * @return \DateTime 
     */
    public function getDatecommentaire()
    {
        return $this->datecommentaire;
    }

    /**
     * Set afficher
     *
     * @param integer $afficher
     * @return Commentaire
     */
    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;
    
        return $this;
    }

    /**
     * Get afficher
     *
     * @return integer 
     */
    public function getAfficher()
    {
        return $this->afficher;
    }

    /**
     * Add idutilisateur
     *
     * @param \Acme\MtmBundle\Entity\Utilisateur $idutilisateur
     * @return Commentaire
     */
    public function addIdutilisateur(\Acme\MtmBundle\Entity\Utilisateur $idutilisateur)
    {
        $this->idutilisateur[] = $idutilisateur;
    
        return $this;
    }

    /**
     * Remove idutilisateur
     *
     * @param \Acme\MtmBundle\Entity\Utilisateur $idutilisateur
     */
    public function removeIdutilisateur(\Acme\MtmBundle\Entity\Utilisateur $idutilisateur)
    {
        $this->idutilisateur->removeElement($idutilisateur);
    }

    /**
     * Get idutilisateur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set iddestinataire
     *
     * @param \Acme\MtmBundle\Entity\Utilisateur $iddestinataire
     * @return Commentaire
     */
    public function setIddestinataire(\Acme\MtmBundle\Entity\Utilisateur $iddestinataire = null)
    {
        $this->iddestinataire = $iddestinataire;
    
        return $this;
    }

    /**
     * Get iddestinataire
     *
     * @return \Acme\MtmBundle\Entity\Utilisateur 
     */
    public function getIddestinataire()
    {
        return $this->iddestinataire;
    }

    /**
     * Set idexpediteur
     *
     * @param \Acme\MtmBundle\Entity\Utilisateur $idexpediteur
     * @return Commentaire
     */
    public function setIdexpediteur(\Acme\MtmBundle\Entity\Utilisateur $idexpediteur = null)
    {
        $this->idexpediteur = $idexpediteur;
    
        return $this;
    }

    /**
     * Get idexpediteur
     *
     * @return \Acme\MtmBundle\Entity\Utilisateur 
     */
    public function getIdexpediteur()
    {
        return $this->idexpediteur;
    }
}