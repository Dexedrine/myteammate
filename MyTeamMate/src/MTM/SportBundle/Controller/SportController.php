<?php

namespace MTM\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\SportBundle\Entity\Sport;
use MTM\SportBundle\Entity\Level;
use MTM\SportBundle\Entity\Slot;
use MTM\SportBundle\Entity\Practice;
use MTM\SportBundle\Form\Type\PracticeType;
use MTM\SportBundle\Entity\Place;


class SportController extends Controller
{
    public function viewAction()
    {
    	$idTeamMate = $this->get('security.context')->getToken()->getUser()->getIdteammate() ;
    	 
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('MTMSportBundle:Practice');
    	 
    	$practices = $repository->findBy(array('idteammate' => $idTeamMate));
    	if (!$practices) {
    		return $this->render('MTMSportBundle:Sport:no_sport.html.twig');
    	}
    	 
    	return $this->render('MTMSportBundle:Sport:sport.html.twig' );
    }
    
    public function addAction(Request $request)
    {
    	$practice = new Practice();
    	$place = new Place();
    	$slot = new Slot();
    	$sport = new Sport();
    	$level= new Level();
    	
    	
    	
    	$practice
	    	->setIdsport($sport)
	    	->setIdplace($place)
	    	->setIdlevel($level)
	    	->addIdslot($slot);
    	
    	$teammate = $this->get('security.context')->getToken()->getUser() ;
    	

    	$form = $this->createForm(new PracticeType(), $practice);
    	
    	
    	
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid() ) {
				
    			$em = $this->getDoctrine()->getManager();
    			
    			$em->persist($sport)	;
    			$em->flush();
    			
    			$em->persist($place)	;
    			$em->flush();
    			
    			$em->persist($level)	;
    			$em->flush();
    			
    			$em->persist($slot)	;
    			$em->flush();
    			
    			$practice->setIdteammate($teammate);
    			
    			$em->persist($practice)	;
    			$em->flush();
    	
    			return $this->redirect($this->generateUrl('sport'));
    		}
    	}
    	
    	return $this
    	->render('MTMSportBundle:Sport:add_sport.html.twig',
    			array('form' => $form->createView(),));
    }
}
