<?php

namespace MTM\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\CommentBundle\Entity\Comment;

class CommentController extends Controller {
	
	public function viewAction() {
		$idTeamMate = $this->get('security.context')->getToken()->getUser()
				->getId();

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCommentBundle:Comment');

		$comments = $repository->findBy(array('idreceiver' => $idTeamMate));
		
		
		return $this->render('MTMCommentBundle:Comment:view.html.twig',
				array( 'comments' => $comments )	);
	}
	
	public function viewPostAction($id,Request $request) {
		$connect_teammate = $this->get('security.context')->getToken()->getUser();

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');

		$teammate = $repository->findOneById($id);
		
		$comment = new Comment();
		
		$form = $this->createFormBuilder($comment)
				->add('body', 'text', array('label' => 'Commentaire'))
				->getForm();
				
		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$teammate->addComment($comment);
				$em->persist($comment->setIdsender($connect_teammate));
				$em->persist($comment->setIdreceiver($teammate));
				$em->flush();
				
				
				return $this->redirect($this->generateUrl('profile'));
			}
		}
		
		return $this->render('MTMCommentBundle:Comment:viewPost.html.twig',
				array( 'teammate' => $teammate,
					'form' => $form	->createView()));
	}
	
	
}