<?php

namespace MTM\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use MTM\ProfileBundle\Entity\Profil;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function profileAction()
    {
    	$idUser = $this->get('security.context')->getToken()->getUser()->getIdutilisateur() ;
    	
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('MTMProfileBundle:Profil');
    	
    	$profile = $repository->findOneBy(array('idutilisateur' => $idUser));
    	if (!$profile) {
    		return $this->render('MTMProfileBundle:Profile:no_profile.html.twig');
    	}
    	
        return $this->render('MTMProfileBundle:Profile:profile.html.twig', 
        		array('nom' => $profile->getNom(), 'prenom' => $profile->getPrenom() ));
    }
    
    public function addAction(Request $request)
    {
    	$profile = new Profil();
    	
    	$user = $this->get('security.context')->getToken()->getUser() ;
    	
    	$form = $this->createFormBuilder($profile)->add('nom', 'text')
    	->add('prenom', 'text')
    	->add('login','text')
    	->add('sexe', 'integer')
    	->add('urlphoto','text')
    	->getForm();
    	
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($profile->setIdutilisateur($user))	;
    			$em->flush();
    	
    			return $this->redirect($this->generateUrl('profile'));
    		}
    	}
    	
    	return $this
    	->render('MTMProfileBundle:Profile:add_profile.html.twig',
    			array('form' => $form->createView(),));
    }
}
