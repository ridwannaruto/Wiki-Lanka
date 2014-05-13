<?php

namespace WikiLanka\FacebookBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\PropertyAccess\PropertyAccess;

class StatusController extends Controller
{
    public function updateAction(Request $request)
    {
        $user = $request->get('user');        
        $status = $request->get('status');
        $manager = $this->getDoctrine()->getManager();
        $database = $manager->getRepository('WikiLankaEntityBundle:Users');
        $currentUser = $database ->findOneBy(array('email'=>$user));
        $token = $currentUser->getToken();
        
        
        
        $facebook_id = $currentUser->getUserid();
        $params = array(
            'access_token' => $token,
            'message' => $status
        );
        $appId= '453545681427596';
        $secret = '9885617e068739cb01b952b2ab571c01';
     
        $token_url = "https://graph.facebook.com/oauth/access_token?client_id=".$appId."&client_secret=".$secret."&grant_type=fb_exchange_token&fb_exchange_token=".$token;
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_URL, $token_url);
        $contents = curl_exec($c);
        $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
        curl_close($c);

        $paramsfb = null;
        parse_str($contents, $paramsfb);        
        $newToken = $paramsfb['access_token'];
        $result;
        
        $currentUser->setToken($newToken);
        $manager->persist($currentUser);
        $manager->flush();
        
        if ($newToken != null){


        $url = "https://graph.facebook.com/$facebook_id/feed";
        $ch = curl_init();
       curl_setopt_array($ch, array(
         CURLOPT_URL => $url,
         CURLOPT_POSTFIELDS => $params,
         CURLOPT_RETURNTRANSFER => true,
           CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_VERBOSE => true
       ));
        $result = curl_exec($ch);
       
        
        
        //$result = "Status Updated";
        }
        
        else{
            
            $result = $err;
            return $this->render('WikiLankaFacebookBundle:Result:Error.html.twig', array('message' => $contents));
        }
  
        if(strpos($result,'id') !== false){
            return $this->render('WikiLankaFacebookBundle:Result:sucess.html.twig', array('message' => $result));
        }
        
        return $this->render('WikiLankaFacebookBundle:Result:Error.html.twig', array('message' => $result));
    }
}
