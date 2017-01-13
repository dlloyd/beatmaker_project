<?php

namespace BOShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends Controller
{

    public function indexAction()
    {
    	$usr_name = $this->get('security.token_storage')->getToken()->getUser()->getUserName();
    	$usr = $this->getDoctrine()->getManager()->getRepository('BOUserBundle:User')->findOneByUsername($usr_name);
    	$commandes = $usr->getCommandes(); 
        return $this->render('BOShopBundle:Default:index.html.twig',array('commands'=>$commandes));
    }



    public function ValidatePaymentAction()
    {

    }
}
