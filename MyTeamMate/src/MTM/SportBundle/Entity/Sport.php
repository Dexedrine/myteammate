<?php

namespace MTM\SportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sport
 *
 * @ORM\Table(name="sport")
 * @ORM\Entity
 */
class Sport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idsport", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sport_idsport_seq", allocationSize=1, initialValue=1)
     */
    private $idsport;

    /**
     * @var string
     *
     * @ORM\Column(name="nomsport", type="string", nullable=true)
     */
    private $nomsport;



    /**
     * Get idsport
     *
     * @return integer 
     */
    public function getIdsport()
    {
        return $this->idsport;
    }

    /**
     * Set nomsport
     *
     * @param string $nomsport
     * @return Sport
     */
    public function setNomsport($nomsport)
    {
        $this->nomsport = $nomsport;
    
        return $this;
    }

    /**
     * Get nomsport
     *
     * @return string 
     */
    public function getNomsport()
    {
        return $this->nomsport;
    }
}