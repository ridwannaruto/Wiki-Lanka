<?php

namespace WikiLanka\EmailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class sendEmailController extends Controller
{
    public function accountCreateAction($username,$firstname)
    {
        echo "Got Here ".$username." ".$firstname;
        
        $message = \Swift_Message::newInstance()
                    ->setSubject('Wiki Lanka Registration')
                    ->setFrom('wikilanka@pixelzexplorer.org')
                    ->setTo($username)
                    ->setBcc('rshariffdeen@gmail.com')
                    
            ;
        $top = $message->embed(Swift_Image::fromPath('top.jpg'));
        $message->setBody(
'<html>' .
' <head></head>' .
' <body>' .
'  Here is an image <img src="' . $top . '" alt="Image" />' .
'  Rest of message' .
' </body>' .
'</html>',
  'text/html' // Mark the content-type as HTML
);
            $this->get('mailer')->send($message);
    }
}
