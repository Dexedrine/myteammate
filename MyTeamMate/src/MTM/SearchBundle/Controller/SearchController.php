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
				
				if($form['practice']['idsport']->getData())
					$string_query = 'SELECT t , pro, pra ,spo FROM MTMCoreBundle:TeamMate t,' .
						' MTMProfileBundle:Profile pro, MTMSportBundle:Practice pra,  ' .
						' MTMSportBundle:Sport spo '.
						'WHERE t.id = pro.idteammate AND t.id = pra.idteammate AND ' .
						'pra.idsport = spo.idsport AND spo.nomsport = \''.$form['practice']['idsport']->getData()->getNomsport().'\' ';
				else
					$string_query = 'SELECT t , pro FROM MTMCoreBundle:TeamMate t,' .
						' MTMProfileBundle:Profile pro ' .
						'WHERE t.id = pro.idteammate ';
				
				if($form['teammate']['username']->getData())
					$string_query .= 'AND t.username = \''.$form['teammate']['username']->getData().'\' '; 
				if($form['teammate']['email']->getData())
					$string_query .= 'AND t.email = \''.$form['teammate']['email']->getData().'\' '; 
				if($form['profile']['name']->getData())
					$string_query .= 'AND pro.name = \''.$form['profile']['name']->getData().'\' ';
				if($form['profile']['firstname']->getData())
					$string_query .= 'AND pro.firstname = \''.$form['profile']['firstname']->getData().'\' ';
				
				$query = $em->createQuery($string_query);
				
				$result = $query->getResult();
				if($result)
					return $this->render('MTMSearchBundle:Search:show_result.html.twig',
						array('result'=> $result,
							'string_query' => $string_query));
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
