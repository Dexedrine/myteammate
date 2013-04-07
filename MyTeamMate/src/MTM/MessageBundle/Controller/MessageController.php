<?php

namespace MTM\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\MessageBundle\Entity\Message;

class MessageController extends Controller
{
public function messageAction()
    {
    	$idUser = $this->get('security.context')->getToken()->getUser()->getIdutilisateur() ;
    	
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('MTMMessageBundle:Message');
    	
    	$messages = $repository->findBy(array('iddestinataire' => $idUser));
    	if (!$messages) {
    		return $this->render('MTMMessageBundle:Message:no_message.html.twig');
    	}
    	
        return $this->render('MTMMessageBundle:Message:message.html.twig');
    }
    
    public function sendAction(Request $request)
    {
    	$Message = new Message();
    	
    	$user = $this->get('security.context')->getToken()->getUser() ;
    	
    	
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid()) {
    			/*$em = $this->getDoctrine()->getManager();
    			$em->persist($profile->setIdutilisateur($user))	;
    			$em->flush();*/
    	
    			return $this->redirect($this->generateUrl('message'));
    		}
    	}
    	
    	//creation du formulaire d'envoie de message dans send_message.html.twig
    	
    	return $this
    	->render('MTMMessageBundle:Message:send_message.html.twig');
    }
}
