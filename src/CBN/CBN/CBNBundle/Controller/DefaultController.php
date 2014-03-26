<?php

namespace CBN\CBNBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBNBundle:Default:index.html.twig', array('name' => $name));
    }
}
