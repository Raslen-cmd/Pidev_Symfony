<?php

namespace App\Controller;



use App\Entity\Commande;
use App\Entity\Lcommande;
use App\Form\CommandeType;
use App\Form\LcommandeType;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use App\Repository\LcommandeRepository;




class CommandeController extends AbstractController
{


 /**
     * @Route("/", name="commandes")
     */
    public function page(): Response
    {
        $commande=$this->getDoctrine()->getManager()->getRepository(Commande::class)->findAll();

     return $this->render('commande/index.html.twig',[
    'c'=>$commande
    ]);
     
       
    }
/**
     * @Route("/addCommande", name="addCommande")
     */
    public function addCommande(Request $request): Response
    {
        
       $commande=new Commande();
       $form=$this->createForm(CommandeType::class,$commande);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            return $this->redirectToRoute('commandes');

        }
        return $this->render('commande/createCommande.html.twig',['f'=>$form->createView()]);
    }


    
 /**
     * @Route("/removeCommande/{id}", name="supp_commande")
     */
    public function suppressionCommande(Commande $commande): Response
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($commande);
        $em->flush();
        return $this->redirectToRoute('commandes');
     
    }

    
/**
     * @Route("/modifCommande/{id}", name="modif_cmd")
     */
    public function modificationCommande(Request $request,$id): Response
    {
        
       $commande=$this->getDoctrine()->getManager()->getRepository(Commande::class)->find($id);
       $form=$this->createForm(CommandeType::class,$commande);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            
            $em->flush();
            return $this->redirectToRoute('commandes');

        }
        return $this->render('commande/updateCommande.html.twig',['f'=>$form->createView()]);
    }
        }
