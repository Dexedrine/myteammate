<?php

namespace Acme\MtmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creneau
 *
 * @ORM\Table(name="creneau")
 * @ORM\Entity
 */
class Creneau
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcreneau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="creneau_idcreneau_seq", allocationSize=1, initialValue=1)
     */
    private $idcreneau;

    /**
     * @var integer
     *
     * @ORM\Column(name="heuredebut", type="integer", nullable=true)
     */
    private $heuredebut;

    /**
     * @var integer
     *
     * @ORM\Column(name="heurefin", type="integer", nullable=true)
     */
    private $heurefin;

    /**
     * @var string
     *
     * @ORM\Column(name="jour", type="string", length=8, nullable=false)
     */
    private $jour;



    /**
     * Get idcreneau
     *
     * @return integer 
     */
    public function getIdcreneau()
    {
        return $this->idcreneau;
    }

    /**
     * Set heuredebut
     *
     * @param integer $heuredebut
     * @return Creneau
     */
    public function setHeuredebut($heuredebut)
    {
        $this->heuredebut = $heuredebut;
    
        return $this;
    }

    /**
     * Get heuredebut
     *
     * @return integer 
     */
    public function getHeuredebut()
    {
        return $this->heuredebut;
    }

    /**
     * Set heurefin
     *
     * @param integer $heurefin
     * @return Creneau
     */
    public function setHeurefin($heurefin)
    {
        $this->heurefin = $heurefin;
    
        return $this;
    }

    /**
     * Get heurefin
     *
     * @return integer 
     */
    public function getHeurefin()
    {
        return $this->heurefin;
    }

    /**
     * Set jour
     *
     * @param string $jour
     * @return Creneau
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
    
        return $this;
    }

    /**
     * Get jour
     *
     * @return string 
     */
    public function getJour()
    {
        return $this->jour;
    }
}