<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Association;
use App\Form\ProfileFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CategoryRepository;

class AssociationController extends AbstractController
{

    // -------------- PAGE D'ACCUEIL --------------
    
    #[Route('/', name: 'home')] // façon d'écrire les routes en php 8
    public function index(): Response
    {
        // récupérer les datas de la base de données

        $associations = $this->getDoctrine()
            ->getRepository(Association::class)
            ->findAll();


        // si il n'y en a pas alors on lance une erreur avec un message
        
        if(!$associations) {
            throw $this->createNotFoundException("Pas d'association à afficher");
        }

        // on retourne ces datas dans la vue correspondante

        return $this->render('association/index.html.twig', [
            'associations' => $associations
        ]);
    }

    // -------------- PAGE PROFIL --------------

    #[Route('/profil', name: 'profil')]
    public function editProfile(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(ProfileFormType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('profil');
        }

        return $this->render('association/profile.html.twig',  [
            'form' => $form->createView(),
        ]);
    }


    // -------------- LISTING ASSOS --------------


    #[Route('/associations', name: 'associations')]
    public function show(CategoryRepository $categoryRepository): Response
    {
        // récupérer les datas de la base de données

        $categories = $categoryRepository->findAll();


        // s'il n'y en a pas alors on lance une erreur avec un message
        
        if(!$categories) {
            throw $this->createNotFoundException("Pas d'association à afficher");
        }

        // on retourne ces datas dans la vue correspondante

        return $this->render('association/show.html.twig', [
            'categories' => $categories
        ]);
    }

    // -------------- SINGLE ASSO --------------

    #[Route('/associations/{slug}', name: 'association')]
    public function single(Association $association): Response
    {

        // s'il n'y en a pas alors on lance une erreur avec un message
        
        if(!$association) {
            throw $this->createNotFoundException("Pas d'association à afficher");
        }

        // on retourne ces datas dans la vue correspondante

        return $this->render('association/single.html.twig', [
            'association' => $association
        ]);
    }

}
