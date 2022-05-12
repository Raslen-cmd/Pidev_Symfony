<?php

namespace App\Controller;
use App\Controller\FileUploader;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use App\Data\SearchData;
use App\Form\SearchForm;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPaginationInterface;

use App\Repository\PaginationInterface;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination ;
use App\Form\SendType;
use Symfony\Component\Form\FormView;


class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="app_produit")
     */
    public function index(ProduitRepository $repository,Request $request,PaginatorInterface $paginator)

    {
        
        $data = new SearchData();
        $form =$this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
           // dd($data);
        $produits= $repository->findSearch($data);
        $donnees=$paginator->paginate(
            $produits,
            $request->query->getInt(
                'page', 1 )
                ,6
            );
        return $this->render('produit/acceuil.html.twig', [
            'p'=>$donnees,
            'form'=>$form->createView(),

        ]); 
        
    
      /*  $produits= $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();
       
        return $this->render('produit/acceuil.html.twig', ['p'=>$produits
        ]);*/
    }

      /**
     * @Route("/", name="showBack_produit")
     */
    public function indexBack(): Response
    {$produits= $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();
        $categories= $this->getDoctrine()->getManager()->getRepository(Categorie::class)->findAll();
        return $this->render('produit/indexBack.html.twig', ['p'=>$produits,'f'=>$categories
        ]);
    }

/**
     * @Route("/produit/addPdt", name="add_produit")
     */
    public function addPdt(Request $request ):Response
    {  $prod= new Produit;
       $form=$this-> createForm(ProduitType::class, $prod);
       $form-> handleRequest($request);

       if($form->isSubmitted() && $form->isValid()) {
           
        $file = $prod->getIcone();
        $fileName= md5(uniqid()).'.'.$file;
        
        $em= $this->getDoctrine()->getManager();
        $prod->setIcone($fileName);
        $em->persist($prod);
        $em->flush();

        return $this->redirectToRoute('app_produit');
    }
       return $this->render('produit/create.html.twig', [
        'f' => $form->createView() ]);
    }

     /**
     * @Route("/modifPdt/{id}", name="update_produit")
     */
    public function update(Request $request,$id): Response
    {
        $prod = $this->getDoctrine()->getManager()->getRepository(Produit::class)->find($id);
        $form = $this->createForm(ProduitType::class,$prod);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
           
            $file = $prod->getIcone();
            $fileName= md5(uniqid()).'.'.$file;
            
             if($fileName){
                 $prod->setIcone($file);
             }
            $em= $this->getDoctrine()->getManager();
            $prod->setIcone($fileName);
            $em->persist($prod);
            $em->flush();
            return $this->redirectToRoute('app_produit');
        }
        return $this->render('produit/update.html.twig',['f'=>$form->createView()]);

    }
     /**
     * @Route("/suppPdt/{id}", name="delete_produit")
     */
    public function delete(Request $request,Produit $prod): Response
    {
        $em= $this->getDoctrine()->getManager();
        $em->remove($prod);
        $em->flush(); 
        
        
        return $this->redirectToRoute('app_produit');
    }

     /**
     * @Route("/detailPdt/{id}", name="detail_produit")
     */
    public function detail($id): Response
    {$produits= $this->getDoctrine()->getManager()->getRepository(Produit::class)->find($id);
        return $this->render('produit/detail.html.twig', ['p'=>$produits
        ]);
    }

  
    /**
     * @Route("/researchPdt", name="research_produit")
     */
    public function research(ProduitRepository $repository)

    {
        $data = new SearchData();
        $form =$this->createForm(SearchForm::class, $data);
    
        $produits= $repository->findSearch();
        return $this->render('produit/index.html.twig', ['p'=>$produits
        ]);
    }
  /**
     * @Route("/categorie/addCat", name=" add_categorie")
     */
    public function addCat(Request $request ):Response
    {
       return $this->render('categorie/create.html.twig');
    }

/**
     * @Route("/wishlist", name="wishlist_produit")
     */
    public function wishlist(ProduitRepository $repository,Request $request)
    {    $produits= $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();
       
        return $this->render('produit/wishlist.html.twig', ['p'=>$produits
        ]);
        
      
    }
    
}
