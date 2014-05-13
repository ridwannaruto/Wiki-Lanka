<?php

namespace WikiLanka\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WikiLanka\EntityBundle\Entity\Mobile;


class registerMobileController extends Controller
{
    public function startAction(Request $request)
    {
        
        $number = $request->get('number');
        $token = $request->get('token');
        $user = $request->get('user');
        $manager = $this->getDoctrine()->getManager();
        $database = $manager->getRepository('WikiLankaEntityBundle:Mobile');
        $currentUser = $database ->findOneBy(array('user'=>$user));
        
        if($currentUser == null){
            do{
                $pin = rand(1000, 9999);
            }while($database->findOneBy(array('pin'=>$pin)));
            $new = new Mobile();
            $new->setMobile($number);
            $new->setPin($pin);
            $new->setToken($token);
            $new->setUser($user);
            $manager->persist($new);
            $manager->flush();
            return $this->render('WikiLankaMobileBundle:mobileRegistration:newMobileUser.html.twig', array('user' => $user, 'pin' => $pin));  
        }
        else{
            $pin = 1;
            $currentUser->setPin($pin);
            $manager->persist($currentUser);
            $manager->flush();
            return $this->render('WikiLankaMobileBundle:mobileRegistration:userAlready.html.twig');
        }
        return $this->render('WikiLankaMobileBundle:Default:index.html.twig');
    }
}
