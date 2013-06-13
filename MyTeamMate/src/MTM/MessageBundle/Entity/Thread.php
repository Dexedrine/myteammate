<?php
namespace MTM\MessageBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use FOS\MessageBundle\Entity\Thread as BaseThread;
use FOS\MessageBundle\Model\ParticipantInterface;
use FOS\MessageBundle\Model\MessageInterface;
use FOS\MessageBundle\Model\ThreadMetadata as ModelThreadMetadata;

/**
 * @ORM\Entity
 * @ORM\Table(name="message_thread")
 */
class Thread extends BaseThread
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="AUTO")
     */
    protected $id;

     /**
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @ORM\OneToMany(targetEntity="MTM\MessageBundle\Entity\Message", mappedBy="thread")
     * @ORM\JoinColumn(name="message", referencedColumnName="id")
     */
    protected $messages;

    /**
     * @ORM\OneToMany(targetEntity="MTM\MessageBundle\Entity\ThreadMetaData", mappedBy="thread", cascade={"all"})
     *@ORM\JoinColumn(name="metadata", referencedColumnName="id")
     */
    protected $metadata;

    public function __construct()
    {
        parent::__construct();

        $this->messages = new ArrayCollection();
    }

    public function setCreatedBy(ParticipantInterface $participant) {
            $this->createdBy = $participant;
            return $this;
    }

    function addMessage(MessageInterface $message) {
            $this->messages->add($message);
    }

    public function addMetadata(ModelThreadMetadata $meta) {
        $meta->setThread($this);
        parent::addMetadata($meta);
    }
    public function getId(){
    	return $this->id;
    }

}