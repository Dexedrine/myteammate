<?php

namespace MTM\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\SearchBundle\Form\Type\SearchType;
use MTM\CoreBundle\Entity\TeamMate;

class SearchController extends Controller
{
	public function searchAction(Request $request)
		{	
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));
		
		
		$form = $this->createForm(new SearchType());
		
		
		if ($request->isMethod('POST')) {
			$form->bind($request);
			
			if ($form->isValid()) {
				
				$em = $this->getDoctrine()->getEntityManager();
				$qb = $em->createQueryBuilder();
				
				$already_one_where = false;
				
				$qb->select('t')
				->from('MTMCoreBundle:TeamMate','t')
				->innerjoin('t.profile','pro');
				if($form['practice']['idsport']->getData() || $form['practice']['idlevel']->getData())
					$qb->innerjoin('t.practices','pra');
				if($form['practice']['idsport']->getData()){
					$qb->innerjoin('pra.idsport','spo','WITH',
						'spo.nomsport = \''.$form['practice']['idsport']->getData()->getNomsport().'\' ');
				}
				if($form['practice']['idlevel']->getData()){
					$qb->innerjoin('pra.idlevel','lev','WITH',
						'lev.level = \''.$form['practice']['idlevel']->getData()->getLevel().'\' ');
				}
				
				$qb->where('t.id != \''.$teammate->getId().'\' '); 
				
				if($form['teammate']['username']->getData())
					$qb->where('t.username = \''.$form['teammate']['username']->getData().'\' '); 
									
				if($form['profile']['name']->getData())
					$qb->andWhere(' pro.name = \''.$form['profile']['name']->getData().'\' ');
					
				
				if($form['profile']['firstname']->getData())
					$qb->andWhere(' pro.firstname = \''.$form['profile']['firstname']->getData().'\' ');
					
				
				
				$query = $qb->getQuery();
				
				$result = $query->getResult();
				if($result)
					return $this->render('MTMSearchBundle:Search:show_result.html.twig',
						array('result'=> $result,
							'form' => $form)
					);
				else{
					$error = 'Aucun résultat';
				}
			}
			else{
				$error = $form->getErrorsAsString();
			}
			return $this->render('MTMSearchBundle:Search:search.html.twig',
				array('form' => $form->createView(),
					'error' => $error));
			
		}
		
		return $this->render('MTMSearchBundle:Search:search.html.twig',
			array('form' => $form->createView(),
				'error' => ''));
		
		}
	
	
}
