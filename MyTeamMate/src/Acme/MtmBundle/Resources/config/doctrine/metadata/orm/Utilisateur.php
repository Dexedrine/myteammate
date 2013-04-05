<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idutilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="utilisateur_idutilisateur_seq", allocationSize=1, initialValue=1)
     */
    private $idutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=80, nullable=true)
     */
    private $mail;

    /**
     * @var integer
     *
     * @ORM\Column(name="acceptusemail", type="integer", nullable=true)
     */
    private $acceptusemail;

    /**
     * @var string
     *
     * @ORM\Column(name="motdepasse", type="string", nullable=true)
     */
    private $motdepasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commentaire", inversedBy="idutilisateur")
     * @ORM\JoinTable(name="abuscommentaire",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idcommentaire", referencedColumnName="idcommentaire")
     *   }
     * )
     */
    private $idcommentaire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Message", inversedBy="idutilisateur")
     * @ORM\JoinTable(name="abusmessage",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idmessage", referencedColumnName="idmessage")
     *   }
     * )
     */
    private $idmessage;

    /**
     * @var \Profil
     *
     * @ORM\ManyToOne(targetEntity="Profil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprofil", referencedColumnName="idprofil")
     * })
     */
    private $idprofil;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcommentaire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idmessage = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
