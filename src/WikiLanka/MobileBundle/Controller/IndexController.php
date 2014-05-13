<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace WikiLanka\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('WikiLankaMobileBundle:mobileRegistration:facebookMobile.html.twig');
    }
}

?>
