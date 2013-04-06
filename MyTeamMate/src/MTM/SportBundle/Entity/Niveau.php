<?php

namespace MTM\SportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Niveau
 *
 * @ORM\Table(name="niveau")
 * @ORM\Entity
 */
class Niveau
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idniveau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="niveau_idniveau_seq", allocationSize=1, initialValue=1)
     */
    private $idniveau;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveau", type="integer", nullable=true)
     */
    private $niveau;



    /**
     * Get idniveau
     *
     * @return integer 
     */
    public function getIdniveau()
    {
        return $this->idniveau;
    }

    /**
     * Set niveau
     *
     * @param integer $niveau
     * @return Niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    
        return $this;
    }

    /**
     * Get niveau
     *
     * @return integer 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
}