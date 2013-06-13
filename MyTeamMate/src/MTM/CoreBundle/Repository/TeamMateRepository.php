<?php
namespace MTM\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class TeamMateRepository extends EntityRepository
implements UserProviderInterface
{
   public function loadUserByUsername($username) {
     return $this->getEntityManager()
         ->createQuery('SELECT u FROM
         MTMCoreBundle:TeamMate u
         WHERE u.username = :username
         OR u.email = :username')
         ->setParameters(array(
                       'username' => $username
                        ))
         ->getOneOrNullResult();
    }
    public function refreshUser(UserInterface $user) {
        return $this->loadUserByUsername($user->getUsername());
    }
    public function supportsClass($class) {
        return $class === 'MTM\CoreBundle\Entity\TeamMate';
    }
}
