<?php

namespace MTM\RegistrationBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\LoginBundle\Entity\TeamMate;

class RegistrationController extends Controller {
	public function registrationAction(Request $request) {
		$teammate = new TeamMate();

		$form = $this->createFormBuilder($teammate)->add('email', 'email')
				->add('password', 'password')
				->add('acceptusemail', 'checkbox')
		->getForm();

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($teammate)	;
				$em->flush();

				return $this->render('MTMRegistrationBundle:Registration:registration_success.html.twig');
			}
		}

		return $this
				->render('MTMRegistrationBundle:Registration:registration.html.twig',
						array('form' => $form->createView(),));
	}
}
