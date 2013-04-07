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
     * @ORM\Column( type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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