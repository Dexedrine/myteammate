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
		$idTeamMate = $this->get('security.context')->getToken()->getUser()
				->getIdteammate();

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMSportBundle:Practice');

		$practices = $repository->findBy(array('idteammate' => $idTeamMate));
		if (!$practices) {
			return $this->render('MTMSportBundle:Sport:no_sport.html.twig');
		}

				
		
		return $this->render('MTMSportBundle:Sport:sport.html.twig',
				array( 'practices' => $practices )	);
	}

	public function addAction(Request $request) {
		$practice = new Practice();
		$place = new Place();
		$slot = new Slot();
		$sport = new Sport();
		$level = new Level();

		$practice->setIdsport($sport)->setIdplace($place)->setIdlevel($level)
				->addIdslot($slot);

		$teammate = $this->get('security.context')->getToken()->getUser();

		$form = $this->createForm(new PracticeType(), $practice);

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {

				$em = $this->getDoctrine()->getManager();
				
				$em->persist($sport);
				$em->persist($place);
				$em->persist($level);

				foreach ($practice->getIdslots() as $slot){
					$em->persist($slot);
				}
				
				$practice->setIdteammate($teammate);

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
				
		//Aller chercher en base :
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMSportBundle:Practice');
		$practice = $repository->findOneBy(array('idpractice' => $idpractice));

		$form = $this->createForm(new PracticeType(), $practice);

		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				
				$em = $this->getDoctrine()->getManager();

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
				
		//Aller chercher en base :
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMSportBundle:Practice');
		$practice = $repository->findOneBy(array('idpractice' => $idpractice));
	
		$em->remove($practice);
		$em->flush();

		return $this->redirect($this->generateUrl('sport'));
	}
}
