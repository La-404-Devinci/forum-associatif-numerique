<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    // -------------- ASSO FILTERED BY CAT --------------

    #[Route('/categories/{slug}', name: 'filtered_assos')]
    public function filtered($slug, CategoryRepository $categoryRepository): Response
    {
        // récupérer les datas de la base de données

        $category = $categoryRepository->findOneBySlug($slug);

        $associations = $category->getAssociations();

        // si il n'y en a pas alors on lance une erreur avec un message
        
        if(!$associations) {
            throw $this->createNotFoundException("Pas d'association à afficher");
        }

        // on retourne ces datas dans la vue correspondante

        return $this->render('category/filtered.html.twig', [
            'associations' => $associations,
            'category' => $category
        ]);
    }
}
