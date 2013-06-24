<?php

namespace MTM\ProfileBundle\Controller;
use MTM\ProfileBundle\Entity\Note;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use MTM\ProfileBundle\Entity\Profile;
use MTM\CoreBundle\Entity\TeamMate;

class NoteController extends Controller {
	
	public function noteProfileAction($id) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');
		
		$profile_teammate = $repository->findOneById($id);
		if($teammate == $profile_teammate) return $this->redirect($this->generateUrl('profile'));
		
		$note = 0;
		$teammate_note = 0;
		
		if(!count($profile_teammate->getNotes()) == 0){
			foreach ( $profile_teammate->getNotes() as $n ) {
				if($n->getIdrater() == $teammate){
					$teammate_note = $n->getValue();
				}
				$note += $n->getValue();       
			}
			$note = round($note / count($profile_teammate->getNotes()), 2);
		}
		
		return $this
		->render('MTMProfileBundle:Note:note_profile.html.twig',
			array('teammate' => $teammate,
				'profile_teammate' => $profile_teammate,
				'note' => $note,
				'teammate_note' => $teammate_note));
	}
	
	public function viewNoteAction() {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		$note = 0;
		
		if(!count($teammate->getNotes()) == 0){
			foreach ( $teammate->getNotes() as $n ) {
				$note += $n->getValue();       
			}
			$note = round($note / count($profile_teammate->getNotes()), 2);
		}
		
		return $this
		->render('MTMProfileBundle:Note:view_note.html.twig',
			array('teammate' => $teammate,
				'note' => $note));
	}
	
	public function noteAction($id,$value) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');
		
		$profile_teammate = $repository->findOneById($id);
		if($teammate == $profile_teammate) return $this->redirect($this->generateUrl('profile'));
		
		$repository = $em->getRepository('MTMProfileBundle:Note');
		
		$note = null;
		
		$notes = $repository->findByIdnoted($profile_teammate->getId());
		foreach ( $notes as $n ) {
       		if ( $n->getIdrater() == $teammate ) {
				$note = $n;
			}
		}	
		if(!$note){
			$note = new Note();
			$note->setIdnoted($profile_teammate);
			$note->setIdrater($teammate);
			$note->setValue($value);
			$em->persist($note);
			$profile_teammate->addNote($note);
		}
		else{
			$note->setValue($value);
		}
		$em->flush();
				
		return $this->redirect($this->generateUrl('note_profile',array('id' => $id)));;
	}	
	
}