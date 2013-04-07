<?php

namespace MTM\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use MTM\ProfileBundle\Entity\Profile;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function profileAction()
    {
    	$idTeamMate = $this->get('security.context')->getToken()->getUser()->getIdteammate() ;
    	
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('MTMProfileBundle:Profile');
    	
    	$profile = $repository->findOneBy(array('idteammate' => $idTeamMate));
    	if (!$profile) {
    		return $this->render('MTMProfileBundle:Profile:no_profile.html.twig');
    	}
    	
        return $this->render('MTMProfileBundle:Profile:profile.html.twig', 
        		array('name' => $profile->getName(), 'firstname' => $profile->getFirstName() ));
    }
    
    public function addAction(Request $request)
    {
    	$profile = new Profile();
    	
    	$teamate = $this->get('security.context')->getToken()->getUser() ;
    	
    	$form = $this->createFormBuilder($profile)->add('name', 'text')
    	->add('firstname', 'text')
    	->add('username','text')
    	->add('sexe', 'text')
    	->add('urlphoto','text')
    	->getForm();
    	
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($profile->setIdteammate($teamate))	;
    			$em->flush();
    	
    			return $this->redirect($this->generateUrl('profile'));
    		}
    	}
    	
    	return $this
    	->render('MTMProfileBundle:Profile:add_profile.html.twig',
    			array('form' => $form->createView(),));
    }
}
