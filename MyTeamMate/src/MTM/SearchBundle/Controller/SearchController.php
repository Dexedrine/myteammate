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
				$query = $em->createQuery(
				    'SELECT t , pro, pra, spo FROM MTMCoreBundle:TeamMate t,' .
				    ' MTMProfileBundle:Profile pro, MTMSportBundle:Practice pra,  ' .
				    'MTMSportBundle:Sport spo ' .
				    'WHERE t.id = pro.idteammate AND t.id = pra.idteammate AND ' .
				    'pra.idsport = spo.idsport AND ' .
				    't.username = :username AND t.email = :email AND ' .
				    'pro.name = :name AND pro.firstname = :firstname AND ' .
				    'spo.nomsport = :sport '
				)->setParameter('username', $form['teammate']['username']->getData())
				->setParameter('email', $form['teammate']['email']->getData())
				->setParameter('name', $form['profile']['name']->getData())
				->setParameter('firstname', $form['profile']['firstname']->getData())
				->setParameter('sport', $form['practice']['idsport']->getData()->getNomsport());
				
				$result = $query->getResult();
				if($result)
					return $this->render('MTMSearchBundle:Search:show_result.html.twig',
				 		array('username' => $result[0]->getUsername()	 ,
				 	'email' => $result[0]->getEmail() ,
				 	'id' => $result[0]->getId(),
				 	'name' => $result[1]->getName()	 ,
				 	'firstname' => $result[1]->getFirstname()	 ,
				 	'sport' => $result[2]->getIdsport() ,
				 	'found' => 'found', 
				 	));
				else
					return $this->render('MTMSearchBundle:Search:show_result.html.twig',
				 		array('found'=> '',));
			}
			else{
				return $this->render('MTMSearchBundle:Search:search.html.twig',
				 array('form' => $form->createView(),
				 		'error' => $form->getErrorsAsString()));
			}
		}

		return $this->render('MTMSearchBundle:Search:search.html.twig',
				 array('form' => $form->createView(),
				 		'error' => ''));

    }
}
