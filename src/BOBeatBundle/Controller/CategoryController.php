<?php

namespace BOBeatBundle\Controller;

use BOBeatBundle\Entity\Category;
use BOBeatBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CategoryController extends Controller
{
    public function addAction(Request $request)
    {
        $categ = new Category();
        $form = $this->createForm(new CategoryType(),$categ);

        if($form->HandleRequest($request)->isValid()){
           $em = $this->getDoctrine()->getManager();
           $em->persist($categ);
           $em->flush(); 

           $request->getSession()->getFlashBag()->add('notice','Category saved');

           return $this->redirectToRoute('bo_beat_addcateg');
        }
        
        return $this->render('BOBeatBundle:Category:add.html.twig',array('form' => $form->createView()));
    }


}
