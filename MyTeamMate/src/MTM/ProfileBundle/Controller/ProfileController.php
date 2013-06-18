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
						array('name' => ucwords($profile->getName()),
								'firstname' => ucwords($profile->getFirstName()),
								'description' => ucwords($profile->getDescription()),
								'picture' => ucwords($profile->getUrlphoto())));
	}
	
	public function pictureAction(Request $request) {		
		if ($request->isMethod('POST')) {
			if ($_POST['photos']) {
				//get user profile to update
				$idTeamMate = $this->get('security.context')->getToken()->getUser()
				->getId();
				$em = $this->getDoctrine()->getManager();
				$repository = $em->getRepository('MTMProfileBundle:Profile');
				$profile = $repository->findOneBy(array('idteammate' => $idTeamMate));
				
				//set profile picture
				$profile->setUrlphoto($_POST['photos']);
				
				//save to database
				$em->persist($profile);
				$em->flush();
				return $this->redirect($this->generateUrl('profile'));
			}
		}
		
		$a_photos = $this->getPhotosUrl();
		
		return $this
			->render('MTMProfileBundle:Profile:picture.html.twig',
					array('pictures' => $a_photos)
				);
	}

	public function othersProfileAction($id) {
		

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMProfileBundle:Profile');

		$profile = $repository->findOneBy(array('idteammate' => $id));
		if (!$profile) {
			return $this
					->render('MTMProfileBundle:Profile:no_profile.html.twig');
		}

		return $this
				->render('MTMProfileBundle:Profile:others_profile.html.twig',
						array('name' => ucwords($profile->getName()),
								'firstname' => ucwords($profile->getFirstName()),
								'description' => ucwords($profile->getDescription()),
								'picture' => ''));
	}

	public function getPhotosUrl() {
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
		$a_photos = array();
		if(	$json_response = @file_get_contents($url_photo)){
			$json_response = substr($json_response,strpos($json_response,'(')+1);
			$json_response = substr($json_response, 0, strlen($json_response)-1);
			$json_response = json_decode($json_response);
		
			$photos = $json_response->photoset->photo;
			foreach ($photos as $p){
				$farm = $p->farm;
				$server = $p->server;
				$photo_id = $p->id;
				$photo_secret = $p->secret;
				
				$flickr_url = sprintf(
						"http://farm%s.staticflickr.com/%s/%s_%s_c.jpg", $farm,
						$server, $photo_id, $photo_secret);
				
				$a_photos[] = $flickr_url;
			}
		}	

		return $a_photos;
	}

	public function addAction(Request $request) {
		$profile = new Profile();

		$teammate = $this->get('security.context')->getToken()->getUser();

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
				$em->persist($profile->setIdteammate($teammate));
				$em->flush();
				return $this->redirect($this->generateUrl('profile'));
			}
		}

		return $this
				->render('MTMProfileBundle:Profile:add_profile.html.twig',
						array('form' => $form->createView()));
	}
}
