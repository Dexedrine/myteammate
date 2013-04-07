<?php

namespace MTM\RegistrationBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\LoginBundle\Entity\Utilisateur;

class RegistrationController extends Controller {
	public function registrationAction(Request $request) {
		$user = new Utilisateur();

		$form = $this->createFormBuilder($user)->add('mail', 'email')
				->add('motdepasse', 'password')
				->add('acceptusemail', 'checkbox')
		->getForm();

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($user->setMotdepasse(sha1($user->getMotdepasse())))	;
				$em->flush();

				return $this->render('MTMRegistrationBundle:Registration:registration_success.html.twig');
			}
		}

		return $this
				->render('MTMRegistrationBundle:Registration:registration.html.twig',
						array('form' => $form->createView(),));
	}
}
