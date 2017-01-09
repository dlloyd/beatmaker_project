<?php

namespace BOShopBundle\Controller;

use BOShopBundle\Entity\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CartController extends Controller
{
 public function indexAction()
  {
    $cart = new Cart($this->container->get('request')->getSession());
    $beat = array();
    $repo = $this->getDoctrine()->getManager()->getRepository('BOBeatBundle:Beat');
    foreach ($cart->getCart() as $key => $value) {
    	 $beat[$key] = $repo->find($key);
    }

    return $this->render('BOShopBundle:Cart:index.html.twig', array(
      'liste' => $beat 
    ));
  }


  public function addAction($id)
  {
    $cart = new Cart($this->container->get('request')->getSession());

    $cart->addItem($id);
    if ($this->container->get('request')->isXmlHttpRequest())
    {
      return $this->render('BOShopBundle:Cart:cart.html.twig', array(
        'cart' => $cart->getCart()
      ));
    }
    else
    {
      return $this->redirect($this->generateUrl('bo_shop_cart'));
    }
  }


  public function removeAction($id)
  {
    $cart = new Cart($this->container->get('request')->getSession());
    $cart->removeItem($id);
    if ($this->container->get('request')->isXmlHttpRequest())
    {
      return $this->render('BOShopBundle:Cart:cart.html.twig', array(
        'cart' => $cart->getCart()
      ));
    }
    else
    {
      return $this->redirect($this->generateUrl('bo_shop_cart'));
    }
  }
}
