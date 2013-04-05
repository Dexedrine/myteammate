<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Creneau
 *
 * @ORM\Table(name="creneau")
 * @ORM\Entity
 */
class Creneau
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcreneau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="creneau_idcreneau_seq", allocationSize=1, initialValue=1)
     */
    private $idcreneau;

    /**
     * @var integer
     *
     * @ORM\Column(name="heuredebut", type="integer", nullable=true)
     */
    private $heuredebut;

    /**
     * @var integer
     *
     * @ORM\Column(name="heurefin", type="integer", nullable=true)
     */
    private $heurefin;

    /**
     * @var string
     *
     * @ORM\Column(name="jour", type="string", length=8, nullable=false)
     */
    private $jour;


}
