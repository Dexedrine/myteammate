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
				->add('username', 'text',array('required' => true))
				->getForm();
		
		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($teammate);
				$em->flush();
				
				
				//ne fonctionne que sur un réseau extérieur à celui de la fac
 				$message = \Swift_Message::newInstance()
 				->setSubject('Inscription sur My Team Mate')
 				->setTo($teammate->getEmail())
 				->setFrom('contact.myteammate@gmail.com')
 				->setContentType("text/html")
 				//faire le template pour l'envoi de mail
				//template pour l'envoi de mail
				->setBody($this->renderView('MTMRegistrationBundle:Mail:email_template.html.twig', array('login' => $teammate->getEmail()) ));
				
 				$this->get('mailer')->send($message);

				return $this->render('MTMRegistrationBundle:Registration:registration_success.html.twig');
			}
		}

		return $this
				->render('MTMRegistrationBundle:Registration:registration.html.twig',
						array('form' => $form->createView(),));
	}
}
