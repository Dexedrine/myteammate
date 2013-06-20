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

class SportController extends Controller {
	public function viewAction() {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		if (!$teammate->getPractices()) {
			return $this->render('MTMSportBundle:Sport:no_sport.html.twig');
		}

				
		
		return $this->render('MTMSportBundle:Sport:sport.html.twig',
				array( 'practices' => $teammate->getPractices() )	);
	}

	public function addAction(Request $request) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		$practice = new Practice();
		$place = new Place();
		$slot = new Slot();

		$practice->setIdplace($place)->addIdslot($slot);
		
		$form = $this->createForm(new PracticeType(), $practice);

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {

				$em = $this->getDoctrine()->getManager();
				
				$em->persist($place);
				$teammate->addPractice($practice);

				$em->persist($practice);
				$em->flush();

				return $this->redirect($this->generateUrl('sport'));
			}
		}

		return $this
				->render('MTMSportBundle:Sport:action_sport.html.twig',
						array('form' => $form->createView(), 'action' => 'add_sport',
								'idpractice' => 0	));
	}

	// avec peut être un paramètre
	public function editAction(Request $request, $idpractice) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
				
		//Aller chercher en base :
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMSportBundle:Practice');
		$practice = $repository->findOneBy(array('idpractice' => $idpractice));


		// récupère les créneaux avant modif
		$originalSlots = array();

		// Crée un tableau contenant les objets Tag courants de la
		// base de données
		foreach ($practice->getIdslots() as $slot)
			$originalSlots[] = $slot;
			
		$form = $this->createForm(new PracticeType(), $practice);

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				
				foreach ($practice->getIdslots() as $slot) {
					foreach ($originalSlots as $key => $toDel) {
						if ($toDel->getIdSlot() === $slot->getIdSlot()) {
							unset($originalSlots[$key]);
						}
						else{
							$em->remove($slot);
						}
					}
				}
				
				$em->flush();

				return $this->redirect($this->generateUrl('sport'));
			}
		}

		return $this
				->render('MTMSportBundle:Sport:action_sport.html.twig',
						array('form' => $form->createView(),
								'action' => 'edit_sport',
								'idpractice' => $idpractice));
	}
	
	public function deleteAction(Request $request, $idpractice) {
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		//Aller chercher en base :
		
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMSportBundle:Practice');
		$practice = $repository->findOneBy(array('idpractice' => $idpractice));
		
		$teammate->removePractice($practice);
		
		$em->remove($practice);
		foreach ($practice->getIdslots() as $slot) {
			$em->remove($slot);
		}
		
		$em->flush();

		return $this->redirect($this->generateUrl('sport'));
	}
}
