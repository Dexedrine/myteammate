<?php

namespace MTM\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class LoginController extends Controller
{
	public function loginAction()
		{
		$request = $this->getRequest();
		$session = $request->getSession();
		
		if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY'))
		{
			// redirect authenticated users to homepage
			return $this->redirect($this->generateUrl('profile'));
		}
		
		// get the login error if there is one
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(
				SecurityContext::AUTHENTICATION_ERROR
			);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
			$session->remove(SecurityContext::AUTHENTICATION_ERROR);
		}
		
		return $this->render(
			'MTMLoginBundle:Login:login.html.twig',
			array(
				// last username entered by the user
				'last_username' => $session->get(SecurityContext::LAST_USERNAME),
				'error'         => $error,
			)
		);
		}
}
