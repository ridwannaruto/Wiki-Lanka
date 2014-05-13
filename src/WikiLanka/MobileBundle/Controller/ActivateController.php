<?php

namespace WikiLanka\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActivateController extends Controller
{
    public function activateAction()//$request)
    {
        $pin = '6610';//$request->get('pin');
        $number = '132516517';//$request->get('number');
        
        $user = $this->getDoctrine()
        ->getRepository('WikiLankaEntityBundle:Database')
        ->findOneBymobile($number);

    if ($user) {
        if($user->getPin()==$pin) {
            $user->setPin('1');
            $status = 'successful';
            return $this->render('WikiLankaMobileBundle:Activation:activation.html.twig', array('status' => $status));
        }
        else{
            $status =  'unsuccessful';
            return $this->render('WikiLankaMobileBundle:Activation:activation.html.twig', array('status' => $status));
     
        }
    }
    if (!$user) {
        $status =  'unsuccessful';
            return $this->render('WikiLankaMobileBundle:Activation:activation.html.twig', array('status' => $status));
     
    }
    }
}
