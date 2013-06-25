<?php

namespace MTM\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MTM\CoreBundle\Entity\TeamMate;

class LoginController extends Controller {
	
	public function preLoginAction() {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if($teammate) return $this->redirect($this->generateUrl('profile'));

		return $this->redirect($this->generateUrl('login'));
		
	}
	
	
}
