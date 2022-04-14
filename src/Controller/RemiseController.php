<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RemiseType;
use App\Entity\Remise;


use App\Repository\RemiseRepository;

use Symfony\Component\HttpFoundation\Request;


class RemiseController extends AbstractController
{
    
 /**
     * @Route("/remise", name="remises")
     */
    public function affichage(): Response
    {
        $remise=$this->getDoctrine()->getManager()->getRepository(Remise::class)->findAll();

     return $this->render('remise/index.html.twig',[
    'r'=>$remise
    ]);
     
       
    }
/**
     * @Route("/addRemise", name="addRemise")
     */
    public function addRemise(Request $request): Response
    {
        
       $remise=new Remise();
       $form=$this->createForm(RemiseType::class,$remise);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($remise);
            $em->flush();
            return $this->redirectToRoute('remises');

        }
        return $this->render('remise/createRemise.html.twig',['f'=>$form->createView()]);
    }


    
 /**
     * @Route("/removeRemise/{id}", name="supp_remise")
     */
    public function suppressionRemise(Remise $remise): Response
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($remise);
        $em->flush();
        return $this->redirectToRoute('remises');
     
    }

    
/**
     * @Route("/modifRemise/{id}", name="modif_rm")
     */
    public function modificationRemise(Request $request,$id): Response
    {
        
       $remise=$this->getDoctrine()->getManager()->getRepository(Remise::class)->find($id);
       $form=$this->createForm(RemiseType::class,$remise);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            
            $em->flush();
            return $this->redirectToRoute('remises');

        }
        return $this->render('remise/updateRemise.html.twig',['f'=>$form->createView()]);
    }
}
