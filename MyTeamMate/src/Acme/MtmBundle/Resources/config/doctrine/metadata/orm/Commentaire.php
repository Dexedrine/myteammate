<?php



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
    
}
