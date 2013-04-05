<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Favori
 *
 * @ORM\Table(name="favori")
 * @ORM\Entity
 */
class Favori
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idfavori", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="favori_idfavori_seq", allocationSize=1, initialValue=1)
     */
    private $idfavori;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefavori", type="datetime", nullable=true)
     */
    private $datefavori;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcreateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idcreateur;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcible", referencedColumnName="idutilisateur")
     * })
     */
    private $idcible;


}
