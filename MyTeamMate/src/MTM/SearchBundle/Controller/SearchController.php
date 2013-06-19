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
				if($form['practice']['idsport']->getData())
					$qb->innerjoin('t.practices','pra')
						->innerjoin('pra.idsport','spo','WITH',
							'spo.nomsport = \''.$form['practice']['idsport']->getData()->getNomsport().'\' ');
									
				if($form['teammate']['username']->getData()){
					$qb->where('t.username = \''.$form['teammate']['username']->getData().'\' '); 
					$already_one_where = true;
				}
				if($form['teammate']['email']->getData())
					if($already_one_where)
						$qb->andWhere(' t.email = \''.$form['teammate']['email']->getData().'\' '); 
					else{
						$qb->where(' t.email = \''.$form['teammate']['email']->getData().'\' '); 
						$already_one_where = true;
					}
					
				if($form['profile']['name']->getData())
					if($already_one_where)
						$qb->andWhere(' pro.name = \''.$form['profile']['name']->getData().'\' ');
					else{
						$qb->where(' pro.name = \''.$form['profile']['name']->getData().'\' ');
						$already_one_where = true;
					}
				if($form['profile']['firstname']->getData())
					if($already_one_where)
						$qb->andWhere(' pro.firstname = \''.$form['profile']['firstname']->getData().'\' ');
					else
						$qb->where(' pro.firstname = \''.$form['profile']['firstname']->getData().'\' ');
					
				
			
				
				
				$query = $qb->getQuery();
				
				$result = $query->getResult();
				if($result)
					return $this->render('MTMSearchBundle:Search:show_result.html.twig',
						array('result'=> $result));
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
