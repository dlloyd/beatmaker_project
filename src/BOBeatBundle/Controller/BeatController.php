<?php

namespace BOBeatBundle\Controller;

use BOBeatBundle\Entity\Beat;
use BOBeatBundle\Form\BeatType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class BeatController extends Controller
{
    public function indexAction()
    {
        return $this->render('BOBeatBundle:Beat:index.html.twig');
    }

    
    public function contactAction()
    {
    	return $this->render('BOBeatBundle:Beat:contact.html.twig');
    }

    public function beatAction()
    {
        $repo = $this->getDoctrine()->getManager()->getRepository('BOBeatBundle:Category');
        $categ= $repo->findAll();
        return $this->render('BOBeatBundle:Beat:beats.html.twig', array('categories' => $categ ));
    }

   

    public function addAction(Request $request)
    {
        $beat = new Beat();
        $form = $this->createForm(new BeatType(),$beat);

        if($form->HandleRequest($request)->isValid()){
           $this->addBeatCss($beat->getName());
           $em = $this->getDoctrine()->getManager();
           $em->persist($beat);
           $em->flush();


           $request->getSession()->getFlashBag()->add('notice','the beat is saved');

           return $this->redirectToRoute('bo_beat_addbeat');
        }
        
        return $this->render('BOBeatBundle:Beat:add.html.twig',array('form' => $form->createView()));

    }



    public function addBeatCss($name)
    {
        $filename= $_SERVER['DOCUMENT_ROOT'] . "/css/albums.css";
        $fp = fopen($filename,"a");
        
        $current =".album." .$name. " .art {
         background: #444 url(../images/albums/blank.jpg) center center;
         background-size: cover;
         } \n";
         fwrite($fp,$current);
         fclose($fp);
        
    }



}
