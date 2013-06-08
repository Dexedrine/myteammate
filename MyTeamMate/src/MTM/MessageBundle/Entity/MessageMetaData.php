<?php
namespace MTM\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\MessageBundle\Entity\MessageMetadata as BaseMessageMetadata;
use FOS\MessageBundle\Model\MessageInterface;
use FOS\MessageBundle\Model\ParticipantInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="message_message_metadata")
 */
class MessageMetadata extends BaseMessageMetadata
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="MTM\MessageBundle\Entity\Message", inversedBy="metadata")
     * @ORM\JoinColumn(name="message", referencedColumnName="id")
     */
    protected $message;

    /**
     * @ORM\ManyToOne(targetEntity="MTM\CoreBundle\Entity\TeamMate")
     *  @ORM\JoinColumn(name="participant", referencedColumnName="id")
     */
    protected $participant;

    public function setMessage(MessageInterface $message) {
        $this->message = $message;
        return $this;
    }

    public function setParticipant(ParticipantInterface $participant) {
            $this->participant = $participant;
            return $this;
    }

}