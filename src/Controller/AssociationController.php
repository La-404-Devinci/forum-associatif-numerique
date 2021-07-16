<?php

namespace App\Controller;

use App\Entity\Association;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssociationController extends AbstractController
{

    // façon d'écrire les routes en php 8

    #[Route('/', name: 'accueil')]

    public function index(): Response
    {

        // on retourne la vue correspondante

        return $this->render('association/index.html.twig', [
            'controller_name' => 'AssociationController'
        ]);
    }

    #[Route('/associations', name: 'association')]
    
    public function show(): Response
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

        return $this->render('association/show.html.twig', [
            'controller_name' => 'AssociationController',
            'associations' => $associations
        ]);
    }
}
