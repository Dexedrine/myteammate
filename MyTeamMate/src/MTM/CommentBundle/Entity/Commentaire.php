<?php

namespace MTM\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 */
class Commentaire
{
    /**
     * @var integer
     */
    private $idcomment;

    /**
     * @var string
     */
    private $contents;

    /**
     * @var \DateTime
     */
    private $datecomment;

    /**
     * @var boolean
     */
    private $visible;

    /**
     * @var \MTM\LoginBundle\Entity\User
     */
    private $idreceiver;

    /**
     * @var \MTM\LoginBundle\Entity\User
     */
    private $idposter;


    /**
     * Get idcomment
     *
     * @return integer 
     */
    public function getIdcomment()
    {
        return $this->idcomment;
    }

    /**
     * Set contents
     *
     * @param string $contents
     * @return Commentaire
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    
        return $this;
    }

    /**
     * Get contents
     *
     * @return string 
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Set datecomment
     *
     * @param \DateTime $datecomment
     * @return Commentaire
     */
    public function setDatecomment($datecomment)
    {
        $this->datecomment = $datecomment;
    
        return $this;
    }

    /**
     * Get datecomment
     *
     * @return \DateTime 
     */
    public function getDatecomment()
    {
        return $this->datecomment;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Commentaire
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    
        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set idreceiver
     *
     * @param \MTM\LoginBundle\Entity\User $idreceiver
     * @return Commentaire
     */
    public function setIdreceiver(\MTM\LoginBundle\Entity\User $idreceiver = null)
    {
        $this->idreceiver = $idreceiver;
    
        return $this;
    }

    /**
     * Get idreceiver
     *
     * @return \MTM\LoginBundle\Entity\User 
     */
    public function getIdreceiver()
    {
        return $this->idreceiver;
    }

    /**
     * Set idposter
     *
     * @param \MTM\LoginBundle\Entity\User $idposter
     * @return Commentaire
     */
    public function setIdposter(\MTM\LoginBundle\Entity\User $idposter = null)
    {
        $this->idposter = $idposter;
    
        return $this;
    }

    /**
     * Get idposter
     *
     * @return \MTM\LoginBundle\Entity\User 
     */
    public function getIdposter()
    {
        return $this->idposter;
    }
}
