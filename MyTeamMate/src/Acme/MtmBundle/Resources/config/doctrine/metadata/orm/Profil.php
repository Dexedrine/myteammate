<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity
 */
class Profil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idprofil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="profil_idprofil_seq", allocationSize=1, initialValue=1)
     */
    private $idprofil;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=15, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=15, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=8, nullable=true)
     */
    private $login;

    /**
     * @var integer
     *
     * @ORM\Column(name="sexe", type="integer", nullable=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="urlphoto", type="string", length=80, nullable=true)
     */
    private $urlphoto;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;


}
