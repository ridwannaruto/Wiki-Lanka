<?php

namespace WikiLanka\FacebookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocationController extends Controller
{
    public function shareAction($name)
    {
        return $this->render('WikiLankaFacebookBundle:Default:index.html.twig', array('name' => $name));
    }
}
