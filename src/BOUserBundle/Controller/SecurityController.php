<?php

namespace BOUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
    
    public function loginAction(Request $request)
    {
    	if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
    		return $this->redirectToRoute('bo_beat_homepage');
    	}

    	$authenticationUtils = $this->get('security.authentication_utils');
        return $this->render('BOUserBundle:Security:login.html.twig',array(
        	'last_username' => $authenticationUtils->getLastUsername(),
        	'error' => $authenticationUtils->getLastAuthenticationError()
        	));
    }
}
