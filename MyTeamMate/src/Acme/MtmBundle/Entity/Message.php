<?php

namespace Acme\MtmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmessage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="message_idmessage_seq", allocationSize=1, initialValue=1)
     */
    private $idmessage;

    /**
     * @var string
     *
     * @ORM\Column(name="contenumessage", type="text", nullable=true)
     */
    private $contenumessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemessage", type="datetime", nullable=true)
     */
    private $datemessage;

    /**
     * @var integer
     *
     * @ORM\Column(name="estlu", type="integer", nullable=true)
     */
    private $estlu;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="idmessage")
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
     * Get idmessage
     *
     * @return integer 
     */
    public function getIdmessage()
    {
        return $this->idmessage;
    }

    /**
     * Set contenumessage
     *
     * @param string $contenumessage
     * @return Message
     */
    public function setContenumessage($contenumessage)
    {
        $this->contenumessage = $contenumessage;
    
        return $this;
    }

    /**
     * Get contenumessage
     *
     * @return string 
     */
    public function getContenumessage()
    {
        return $this->contenumessage;
    }

    /**
     * Set datemessage
     *
     * @param \DateTime $datemessage
     * @return Message
     */
    public function setDatemessage($datemessage)
    {
        $this->datemessage = $datemessage;
    
        return $this;
    }

    /**
     * Get datemessage
     *
     * @return \DateTime 
     */
    public function getDatemessage()
    {
        return $this->datemessage;
    }

    /**
     * Set estlu
     *
     * @param integer $estlu
     * @return Message
     */
    public function setEstlu($estlu)
    {
        $this->estlu = $estlu;
    
        return $this;
    }

    /**
     * Get estlu
     *
     * @return integer 
     */
    public function getEstlu()
    {
        return $this->estlu;
    }

    /**
     * Add idutilisateur
     *
     * @param \Acme\MtmBundle\Entity\Utilisateur $idutilisateur
     * @return Message
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
     * @return Message
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
     * @return Message
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