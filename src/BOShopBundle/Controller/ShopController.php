<?php

namespace BOShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopController extends Controller
{

	$usr = $this->get('security.token_storage')->getToken()->getUser();

    public function indexAction()
    {
    	$commandes = $usr->getCommandes(); 
        return $this->render('BOShopBundle:Default:index.html.twig',array('commandes'=>$commandes));
    }


    public function buyAction()
    {

    }
}
