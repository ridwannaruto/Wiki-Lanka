<?php

namespace WikiLanka\WelcomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller {

    public function indexAction() {
        return $this->render('WikiLankaWelcomeBundle:Login:login.html.twig', array('message' => ''));
    }

    public function registerAction(Request $request) {
        $userID = $request->get('user');
        $token = $request->get('token');

        if (!$userID) {
            return $this->render('WikiLankaWelcomeBundle:Register:connectFacebook.html.twig', array());
        } else {

            return $this->render('WikiLankaWelcomeBundle:Register:register.html.twig', array('fbUser' => $userID, 'access' => $token));
        }
    }

    public function forgotAction() {
        return $this->render('WikiLankaWelcomeBundle:Forgot:forgot.html.twig', array());
    }

    public function loginAction(Request $request) {
        if ($request->getMethod() == "POST") {

            $username = $request->get('login');
            $password = $request->get('access');

            $manager = $this->getDoctrine()->getManager();
            $database = $manager->getRepository('WikiLankaEntityBundle:Users');
            $loginUser = $database->findOneBy(array('email' => $username, 'password' => $password));

            if ($loginUser) {
                $user_ID = $loginUser->getUserid();
                $email = $loginUser->getEmail();
                $firstName = $loginUser->getFirst();
                $lastName = $loginUser->getLast();
                $confirmed = $loginUser->getConfirmed();
                if ($confirmed == 0) {
                     return $this->render('WikiLankaWelcomeBundle:Login:login.html.twig', array('message' => 'Your account is not activated. Check your email.'));
            
                } else {
                    return $this->render('WikiLankaPCBundle:Home:home.html.twig', array('user' => $email, 'user' => $user_ID, 'first' => $firstName, 'last' => $lastName));
                }
            } else {
                return $this->render('WikiLankaWelcomeBundle:Login:login.html.twig', array('message' => 'Invalid User Name or Password'));
            }


            return $this->render('WikiLankaWelcomeBundle:Forgot:forgot.html.twig', array());
        } else {
            return $this->render('WikiLankaWelcomeBundle:Login:login.html.twig', array('message' => ''));
        }
    }

}
