<?php

namespace MTM\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use MTM\CoreBundle\Entity\TeamMate;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity
 */
class Profile
{
    /**
     * @var integer
     *
     * @ORM\Column( type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idprofile;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"M", "F"})
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="urlphoto", type="string", length=150, nullable=true)
     */
    private $urlphoto;

    /**
     * @var \TeamMate
     *
     * @ORM\OneToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idteammate", referencedColumnName="id")
     * })
     */
    private $idteammate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=4000, nullable=true)
     */
	private $description;
   

    /**
     * Get idprofile
     *
     * @return integer 
     */
    public function getIdprofile()
    {
        return $this->idprofile;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Profile
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Profile
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Profile
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    
        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set urlphoto
     *
     * @param string $urlphoto
     * @return Profile
     */
    public function setUrlphoto($urlphoto)
    {
        $this->urlphoto = $urlphoto;
    
        return $this;
    }

    /**
     * Get urlphoto
     *
     * @return string 
     */
    public function getUrlphoto()
    {
        return $this->urlphoto;
    }

    /**
     * Set idteammate
     *
     * @param \MTM\CoreBundle\Entity\TeamMate $id
     * @return Profile
     */
    public function setIdteammate(\MTM\CoreBundle\Entity\TeamMate $idteammate = null)
    {
        $this->idteammate = $idteammate;
    
        return $this;
    }

    /**
     * Get idteammate
     *
     * @return \MTM\CoreBundle\Entity\TeamMate 
     */
    public function getIdteammate()
    {
        return $this->idteammate;
    }
    

    /**
     * Set description
     *
     * @param string $description
     * @return Profile
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
