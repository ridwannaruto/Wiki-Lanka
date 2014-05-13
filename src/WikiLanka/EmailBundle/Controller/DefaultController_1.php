<?php

namespace WikiLanka\EmailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WikiLankaEmailBundle:Default:index.html.twig', array('name' => $name));
    }
}
