<?php

namespace MTM\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MTM\CommentBundle\Entity\Comment;

class CommentController extends Controller {
	
	public function viewAction() {
		$teammate = $this->get('security.context')->getToken()->getUser();
		
		
		return $this->render('MTMCommentBundle:Comment:view.html.twig',
				array( 'comments' => $teammate->getComments() )	);
	}
	
	public function viewPostAction($id,Request $request) {
		$connect_teammate = $this->get('security.context')->getToken()->getUser();

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('MTMCoreBundle:TeamMate');

		$teammate = $repository->findOneById($id);
		if($teammate == $connect_teammate) return $this->redirect($this->generateUrl('profile'));
		
		$comment = new Comment();
		
		$form = $this->createFormBuilder($comment)
				->add('body', 'textarea', array('label' => 'Commentaire'))
				->getForm();
				
		if ($request->isMethod('POST')) {
			$form->bind($request);

			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$teammate->addComment($comment);
				$em->persist($comment->setIdsender($connect_teammate));
				$em->persist($comment->setIdreceiver($teammate));
				$em->flush();
				
				
				return $this->redirect($this->generateUrl('view_post',array('id' => $id)));
			}
		}
		
		return $this->render('MTMCommentBundle:Comment:viewPost.html.twig',
				array( 'teammate' => $teammate,
					'form' => $form	->createView()));
	}
	
	
}
