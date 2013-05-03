<?php
namespace MTM\MessageBundle\Entity;


use Doctrine\ORM\EntityRepository;

class MessageRepository extends EntityRepository {
	public function findOneByIdJoinedToTeamMate($id)
	{
		$query = $this->getEntityManager()
		->createQuery('
            SELECT m, r FROM MTMMessageBundle:Entity m
            JOIN m.category r
            WHERE m.idreceiver = :id'
		)->setParameter('idreceiver', $id);
	
		try {
			return $query->getSingleResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
			return null;
		}
	}

}
