<?php

namespace MTM\ProfileBundle\Controller;
use MTM\ProfileBundle\Entity\Note;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use MTM\ProfileBundle\Entity\Profile;
use MTM\CoreBundle\Entity\TeamMate;

class NoteController extends Controller {
	
	public function noteProfileAction($id) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');
		
		$profile_teammate = $repository->findOneById($id);
	 	/*$note = new Note() ;
	 	
	 	$form = $this->createFormBuilder($note)
			 	->add('value', 'text',  array('label' => 'Note'))
			 	->getForm();*/

		return $this
				->render('MTMProfileBundle:Note:note_profile.html.twig',
						array('teammate' => $teammate,
							'profile_teammate' => $profile_teammate));
	}
}