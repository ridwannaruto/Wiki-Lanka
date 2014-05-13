<?php

namespace WikiLanka\PCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PCController extends Controller
{
    public function homeAction(Request $request)
    {
        $number = $request->get('number');
        $token = $request->get('token');
        $user = $request->get('user');
        
        return $this->render('WikiLankaPCBundle:Home:home.html.twig',array('user'=>$user,'first'=>'Ridwan','last'=>'Shariffdeen'));
    }
}
