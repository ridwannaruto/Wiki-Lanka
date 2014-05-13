<?php

namespace WikiLanka\FacebookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnectionController extends Controller
{
    public function connectAction()
    {
        return $this->render('WikiLankaFacebookBundle:Connect:facebook.html.twig');
    }
}
