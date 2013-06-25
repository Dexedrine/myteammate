<?php

namespace MTM\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\CoreBundle\Entity\TeamMate;

class FavoriteController extends Controller {
	
	public function viewAction() {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));

		return $this->render('MTMCoreBundle:Favorite:view.html.twig',
				array( 'favorites' => $teammate->getFavorites() )	);
	}
	
	public function addAction($id){
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');

		$favorite_teammate = $repository->findOneById($id);
		
		$teammate->addFavorite($favorite_teammate);
		$em->flush();
		
		return $this
				->render('MTMProfileBundle:Profile:others_profile.html.twig',
						array('teammate' => $teammate,
							'profile_teammate' => $favorite_teammate));	
	}
	
	public function removeAction($id){
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');

		$favorite_teammate = $repository->findOneById($id);
		
		$teammate->removeFavorite($favorite_teammate);
		$em->flush();
		
		return $this
				->render('MTMProfileBundle:Profile:others_profile.html.twig',
						array('teammate' => $teammate,
							'profile_teammate' => $favorite_teammate));	
	}
}
