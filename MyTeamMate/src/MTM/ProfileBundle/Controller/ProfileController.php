<?php

namespace MTM\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use MTM\ProfileBundle\Entity\Profile;

class ProfileController extends Controller {
	public function profileAction() {
		$idTeamMate = $this->get('security.context')->getToken()->getUser()
				->getId();

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMProfileBundle:Profile');

		$profile = $repository->findOneBy(array('idteammate' => $idTeamMate));
		if (!$profile) {
			return $this
					->render('MTMProfileBundle:Profile:no_profile.html.twig');
		}

		return $this
				->render('MTMProfileBundle:Profile:profile.html.twig',
						array('id' => $idTeamMate,
								'name' => ucwords($profile->getName()),
								'firstname' => ucwords($profile->getFirstName()),
								'picture' => $this->getPhotoUrl($this->get('security.context')->getToken()->getUser()->getUsername())));
	}

	public function getPhotoUrl($username) {
		//appeler cette photo lors de l'upload pour récupérer l'url à stocker en base

		//get flickr parameters from parameters.yml	
		$api_key = $this->container->getParameter('flickr_api.api_key');
		$user_id = $this->container->getParameter('flickr_api.user_id');
		$photoset_id = $this->container->getParameter('flickr_api.photoset_id');
		$auth_token = $this->container->getParameter('flickr_api.auth_token');
		$secret = $this->container->getParameter('flickr_api.user_secret');

		$api_sig = md5(
				$secret . "api_key" . $api_key . "auth_token" . $auth_token
						. "formatjsonmethodflickr.photosets.getPhotosphotoset_id"
						. $photoset_id);

		//build url to get photo information
		$url_photo = 'http://api.flickr.com/services/rest/?api_sig=' . $api_sig
				. '&api_key=' . $api_key . '&auth_token=' . $auth_token
				. '&method=flickr.photosets.getPhotos&format=json&photoset_id='
				. $photoset_id;

		//parse result and build picture url
		$photo = "";
		if(	$json_response = @file_get_contents($url_photo)){
			$json_response = substr($json_response,strpos($json_response,'(')+1);
			$json_response = substr($json_response, 0, strlen($json_response)-1);
			$json_response = json_decode($json_response);
		
			$photos = $json_response->photoset->photo;
			foreach ($photos as $p){
				if($p->title == $username){
					$photo = $p;
					break;
				}
			}
		}					
	
		if($photo != ""){
			$farm = $photo->farm;
			$server = $photo->server;
			$photo_id = $photo->id;
			$photo_secret = $photo->secret;
			
			$flickr_url = sprintf("http://farm%s.staticflickr.com/%s/%s_%s_c.jpg",$farm,$server,$photo_id,$photo_secret);
			
			return $flickr_url;
		}
		return false;
		
	}

	public function addAction(Request $request) {
		$profile = new Profile();

		$teamate = $this->get('security.context')->getToken()->getUser();

		$form = $this->createFormBuilder($profile)
				->add('name', 'text', array('label' => 'Nom'))
				->add('firstname', 'text', array('label' => 'Prénom'))
				/*->add('sexe', 'choice', array('choices' => array('h' =>'Homme', 'f' => 'Femme'),
						'multiple' => false,
						'expanded' => true))*/
				->add('sexe', 'text', array('label' => 'Sexe'))
						->getForm();


		/* TODO champ upload d'image */

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($profile->setIdteammate($teamate));
				$em->flush();

				/* TODO  upload photo to flickr, get url and store to database */ 

				return $this->redirect($this->generateUrl('profile'));
			}
		}

		return $this
				->render('MTMProfileBundle:Profile:add_profile.html.twig',
						array('form' => $form->createView()));
	}
}
