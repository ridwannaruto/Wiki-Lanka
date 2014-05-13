<?php

namespace WikiLanka\WelcomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WikiLanka\EntityBundle\Entity\Users;

class AddController extends Controller {

    public function addAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            if ($request->get('password') != $request->get('repassword')) {
                return $this->render('WikiLankaWelcomeBundle:Messages:Error.html.twig', array('message' => 'Password Do Not Match'));
            }
            $manager = $this->getDoctrine()->getManager();
            $database = $manager->getRepository('WikiLankaEntityBundle:Users');

            if ($database->findOneBy(array('email' => $request->get('username')))) {
                return $this->render('WikiLankaWelcomeBundle:Messages:Error.html.twig', array('message' => 'Account already created for this email: ' . $request->get('username')));
            }


            $user = new Users();
            $user->setEmail($request->get('username'));
            $user->setFirst($request->get('firstname'));
            $user->setLast($request->get('lastname'));
            $user->setPassword($request->get('password'));
            $user->setToken($request->get('access'));
            $user->setUserid($request->get('fbUser'));
            $user->setConfirmed(0);


            $manager->persist($user);
            $manager->flush();
            $activate="www.wikilanka.pixelzexplorer.org/Wiki-Lanka/web/activate/kIBuibuibubuiUIbub89y89NIUBuibib89gioGTtgionigbjkbbkjbiuuyvIU6fvbuiklibvytcvui/".$request->get('username')."/unvdksbginHihuiguib6757niUIBBHTTP";
            $delete="www.wikilanka.pixelzexplorer.org/Wiki-Lanka/web/delete/MIonnoim24moinionnoinIOONINqer9891ytcvui/".$request->get('username')."/DELbiubuibuB8y89yhini";

            $message = \Swift_Message::newInstance()
                    ->setSubject('Wiki Lanka Registration')
                    ->setFrom('wikilanka@pixelzexplorer.org')
                    ->setTo($request->get('username'))
                    ->setBcc('rshariffdeen@gmail.com')
                    ->setBody(
                    $this->renderView(
                            'WikiLankaEmailBundle:Register:confirm.html.twig', array('name' => $request->get('firstname'), 'activate' => $activate, 'delete' => $delete)
                    ), 'text/html'
                    )
            ;
            $this->get('mailer')->send($message);
            //$email = $this->forward('email.send:accountCreateAction',array('username'=>$request->get('username'),'firstname'=>$request->get('firstname')));

            
            return $this->render('WikiLankaWelcomeBundle:Messages:success.html.twig', array('message' => 'confirmation email has been sent to ' . $request->get('username')));
        } else {
            return $this->render('WikiLankaWelcomeBundle:Messages:Error.html.twig', array('message' => 'User Not Created'));
        }
    }
    
    public function activateAction($id){
        
        $manager = $this->getDoctrine()->getManager();
        $database = $manager->getRepository('WikiLankaEntityBundle:Users');
        $user = $database->findOneBy(array('email' =>$id));
        $user->setConfirmed('1');        
        $manager->flush();
        
         return $this->render('WikiLankaWelcomeBundle:Messages:success.html.twig', array('message' => 'your account is now active'));
            
    }
    
    public function deleteAction($id){
       
        $manager = $this->getDoctrine()->getManager();
        $database = $manager->getRepository('WikiLankaEntityBundle:Users');
        $user = $database->findOneBy(array('email' =>$id));
        $manager->remove($user);
        $manager->flush();
         return $this->render('WikiLankaWelcomeBundle:Messages:success.html.twig', array('message' => 'account was deleted successfully'));
            
    }

}
