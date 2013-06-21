<?php

namespace MTM\ProfileBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use MTM\ProfileBundle\Entity\Profile;

class NoteController extends Controller {
	
	public function profileAction() {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));

		if (!$teammate->getProfile()) {
			return $this
					->render('MTMProfileBundle:Profile:no_profile.html.twig');
		}

		return $this
				->render('MTMProfileBundle:Profile:profile.html.twig',
						array( 'teammate' => $teammate));
	}
	
		public function othersProfileAction($id) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));		
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');

		$profile_teammate = $repository->findOneById($id);

		return $this
				->render('MTMProfileBundle:Profile:others_profile.html.twig',
						array('teammate' => $teammate,
							'profile_teammate' => $profile_teammate));
	}

	public function addAction(Request $request) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		$profile = new Profile();


		$form = $this->createFormBuilder($profile)
				->add('name', 'text', array('label' => 'Nom'))
				->add('firstname', 'text', array('label' => 'Prénom'))
				->add('sexe', 'text', array('label' => 'Sexe(H/F)'))
				->add('description', 'text',  array('label' => 'Description'))
				->getForm();

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$teammate->setProfile($profile);
				$em->persist($profile);
				$em->flush();
				return $this->redirect($this->generateUrl('profile'));
			}
		}

		return $this
				->render('MTMProfileBundle:Profile:add_profile.html.twig',
						array('form' => $form->createView()));
	}
}