<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Pratique
 *
 * @ORM\Table(name="pratique")
 * @ORM\Entity
 */
class Pratique
{
    /**
     * @var \Lieu
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Lieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idlieu", referencedColumnName="idlieu")
     * })
     */
    private $idlieu;

    /**
     * @var \Niveau
     *
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idniveau", referencedColumnName="idniveau")
     * })
     */
    private $idniveau;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;

    /**
     * @var \Sport
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Sport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsport", referencedColumnName="idsport")
     * })
     */
    private $idsport;

    /**
     * @var \Creneau
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Creneau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcreneau", referencedColumnName="idcreneau")
     * })
     */
    private $idcreneau;


}
