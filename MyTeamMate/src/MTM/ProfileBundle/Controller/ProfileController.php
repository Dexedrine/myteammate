<?php

namespace MTM\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function profileAction($name)
    {
        return $this->render('MTMProfileBundle:Default:profile.html.twig', array('name' => $name));
    }
}
