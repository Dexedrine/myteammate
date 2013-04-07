<?php

namespace MTM\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SportController extends Controller
{
    public function viewAction()
    {
    	$idUser = $this->get('security.context')->getToken()->getUser()->getIdutilisateur() ;
    	 
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('MTMSportBundle:Pratique');
    	 
    	$sports = $repository->findBy(array('idutilisateur' => $idUser));
    	if (!$sports) {
    		return $this->render('MTMSportBundle:Sport:no_sport.html.twig');
    	}
    	 
    	return $this->render('MTMSportBundle:Sport:sport.html.twig' );
    }
    
    public function addAction(Request $request)
    {
    	/*$sport = new Pratique();
    	
    	$user = $this->get('security.context')->getToken()->getUser() ;
    	
    	
    	
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($profile->setIdutilisateur($user))	;
    			$em->flush();
    	
    			return $this->redirect($this->generateUrl('profile'));
    		}
    	}*/
    	
    	return $this
    	->render('MTMSportBundle:Sport:add_sport.html.twig');
    }
}
