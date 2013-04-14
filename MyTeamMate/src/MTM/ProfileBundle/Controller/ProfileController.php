<?php

namespace MTM\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use MTM\ProfileBundle\Entity\Profile;

class ProfileController extends Controller {
	public function profileAction() {
		$idTeamMate = $this->get('security.context')->getToken()->getUser()
				->getIdteammate();

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMProfileBundle:Profile');

		$profile = $repository->findOneBy(array('idteammate' => $idTeamMate));
		if (!$profile) {
			return $this
					->render('MTMProfileBundle:Profile:no_profile.html.twig');
		}

		return $this
				->render('MTMProfileBundle:Profile:profile.html.twig',
						array(
							'name' => ucwords($profile->getName()),
							'firstname' => ucwords($profile->getFirstName()),
							'picture' => $profile->getUrlphoto()
						)
				);
	}

	public function addAction(Request $request) {
		$profile = new Profile();

		$teamate = $this->get('security.context')->getToken()->getUser();

		$form = $this->createFormBuilder($profile)
				->add('name', 'text', array('label' => 'Nom'))
				->add('firstname', 'text', array('label' => 'Prénom'))
				->add('username', 'text',
						array('label' => 'Nom d\'utilisateur'))
				->add('sexe', 'text', array('label' => 'Sexe(H/F)'))
				->add('urlphoto', 'text',
						array('label' => 'URL de votre photo'))->getForm();

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($profile->setIdteammate($teamate));
				$em->flush();

				return $this->redirect($this->generateUrl('profile'));
			}
		}

		return $this
				->render('MTMProfileBundle:Profile:add_profile.html.twig',
						array('form' => $form->createView(),));
	}
}
