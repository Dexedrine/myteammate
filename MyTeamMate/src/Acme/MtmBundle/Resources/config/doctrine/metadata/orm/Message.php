<?php



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
    
}
