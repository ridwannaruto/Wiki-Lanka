<?php

namespace WikiLanka\FacebookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TokenController extends Controller
{
    public function renewAction($name)
    {
        return $this->render('WikiLankaFacebookBundle:Default:index.html.twig', array('name' => $name));
    }
}
