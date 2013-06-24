<?php

namespace MTM\MessageBundle\Controller;


use MTM\CoreBundle\Entity\TeamMate;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\MessageBundle\Provider\ProviderInterface;
use FOS\MessageBundle\Controller\MessageController as BaseController;

class MessageController extends BaseController
{
	public function messageAction()
	{
		$teammate = $this->get('security.context')->getToken()->getUser();
		if(!$teammate) return $this->redirect($this->generateUrl('login'));

		if (!$teammate->getProfile()) {
			return $this
					->render('MTMProfileBundle:Profile:no_profile.html.twig');
		}
		return $this
		->render('MTMMessageBundle:Message:layout.html.twig',
				array( 'teammate' => $teammate));
		
	}
    /**
     * Create a new message thread
     *
     * @return Response
     */
    public function newMessageAction($teammate){
    	
        $form = $this->container->get('fos_message.new_thread_form.factory')->create();
        $formHandler = $this->container->get('fos_message.new_thread_form.handler');

        if ($message = $formHandler->process($form)) {
            return new RedirectResponse($this->container->get('router')->generate('new_message', array(
                'threadId' => $message->getThread()->getId()
            )));
        }

        return $this->container->get('templating')->renderResponse('MTMMessageBundle:Message:newMessage.html.twig', array(
            'teammate' => $teammate,
        	'form' => $form->createView(),
            'data' => $form->getData()
        ));
    }
}
