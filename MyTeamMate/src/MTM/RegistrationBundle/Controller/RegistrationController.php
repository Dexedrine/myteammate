<?php

namespace MTM\RegistrationBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\LoginBundle\Entity\TeamMate;

class RegistrationController extends Controller {
	public function registrationAction(Request $request) {
		
		if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY'))
    	{
        	// redirect authenticated users to homepage
        	return $this->redirect($this->generateUrl('profile'));
    	}
    	
		$teammate = new TeamMate();
		$form = $this->createFormBuilder($teammate)		
				->add('email', 'email', array('attr' => array('placeholder' => 'Adresse Mail')))
				->add('password', 'repeated', array('type' => 'password',
  												  'invalid_message' => 'Les mots de passe doivent correspondre',
   												 'options' => array('required' => true)))		
				->add('acceptusemail', 'checkbox',array('required' => false))
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
