<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Association;
use App\Form\ProfileFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

class AssociationController extends AbstractController
{

    private $associationRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->associationRepository = $em->getRepository(Association::class);
    }

    // -------------- PAGE D'ACCUEIL --------------
    
    #[Route('/', name: 'home')] // façon d'écrire les routes en php 8
    public function index(): Response
    {
        // récupérer les datas de la base de données

        $associations = $this->associationRepository->findAll();


        // si il n'y en a pas alors on lance une erreur avec un message
        
        if(!$associations) {
            throw $this->createNotFoundException("Pas d'association à afficher");
        }

        // on retourne ces datas dans la vue correspondante

        return $this->render('association/index.html.twig', [
            'associations' => $associations
        ]);
    }

    // -------------- ACCUEIL ADMIN --------------

    #[Route('/admin', name: 'admin')]
    public function accueilAdmin() {
        return $this->render('admin/accueil.html.twig');
    }

    // -------------- PAGE PROFIL --------------

    #[Route('/profil', name: 'profil')]
    public function editProfile(Request $request, SluggerInterface $slugger)
    {
        $user = $this->getUser();
        $form = $this->createForm(ProfileFormType::class, $user);
        $form->handleRequest($request);
        //dd($user);
        $filesystem = new Filesystem();
        $galerie = 'empty';
        if($filesystem->exists(__DIR__.'/../../public/uploads/' . $user->getSlug() . '/images')) {

            $galerieFinder = new Finder();
            $galerieFinder->files()->in(__DIR__.'/../../public/uploads/' . $user->getSlug() . '/images');
            if($galerieFinder->hasResults()) {
                $galerie = [];
                foreach ($galerieFinder as $file) {
                    array_push($galerie, $file->getRelativePathname());
                }
            }
        }




        if($form->isSubmitted() && $form->isValid()) {
            
            $logoFile =$form->get('logoAsso')->getData();
            $videoFile =$form->get('video')->getData();
            $imageFile =$form->get('image')->getData();
            $bannerFile =$form->get('banner')->getData();

            if($logoFile) {
                $originalFilename = pathinfo($logoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$logoFile->guessExtension();

                try {
                    $logoFile->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads/' . $user->getSlug() . "/logos",
                        $newFilename
                    );
                } catch (FileException $e) {

                }

                $user->setLogo($newFilename);
            }

            if($videoFile) {
                $originalFilename = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$videoFile->guessExtension();

                try {
                    $videoFile->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads/' . $user->getSlug() . "/videos",
                        $newFilename
                    );
                } catch (FileException $e) {

                }
            }

            if($imageFile) {
                foreach($imageFile as $if) {
                    $originalFilename = pathinfo($if->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$if->guessExtension();

                    try {
                        $if->move(
                            $this->getParameter('kernel.project_dir').'/public/uploads/' . $user->getSlug() . "/images",
                            $newFilename
                        );
                    } catch (FileException $e) {
    
                    }
                }
            }

            if($bannerFile) {
                $originalFilename = pathinfo($bannerFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$bannerFile->guessExtension();

                try {
                    $bannerFile->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads/' . $user->getSlug() . "/banners",
                        $newFilename
                    );
                } catch (FileException $e) {

                }
            }
            

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('profil');
        }

        return $this->render('association/profile.html.twig',  [
            'form' => $form->createView(),
            'images' => $galerie,
            'slug' => $user->getSlug(),
            'cat' => $user->getCategory()->getName()
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
        } else {

            $filesystem = new Filesystem();

            // Inject images gallery to twig
            $galerie = 'empty';
            if($filesystem->exists(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/images')) {

                $galerieFinder = new Finder();
                $galerieFinder->files()->in(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/images');
                if($galerieFinder->hasResults()) {
                    $galerie = [];
                    foreach ($galerieFinder as $file) {
                        array_push($galerie, $file->getRelativePathname());
                    }
                }
            }

            // Inject logo to twig
            $logo = 'default';
            if($filesystem->exists(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/logos')) {
                $logoFinder = new Finder();
                $logoFinder->files()->in(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/logos');
                foreach ($logoFinder as $file) {
                    $logo =  $file->getRelativePathname();
                }
            }



            // Inject video to twig
            $video = 'empty';
            if($filesystem->exists(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/videos')) {
                $videoFinder = new Finder();
                $videoFinder->files()->in(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/videos');
                foreach ($videoFinder as $file) {
                    $video =  $file->getRelativePathname();
                }
            }


            // Inject banner to twig
            $banner = 'default';
            if($filesystem->exists(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/banners')) {
                $bannerFinder = new Finder();
                $bannerFinder->files()->in(__DIR__.'/../../public/uploads/' . $association->getSlug() . '/banners');
                foreach ($bannerFinder as $file) {
                    $banner =  $file->getRelativePathname();
                }
            }

        }

        $links = 'empty';
        if(!empty($association->getAutre())) {
            $bonusLinks = explode(',', $association->getAutre());
            $links = array_map('trim', $bonusLinks);
        }


        // on retourne ces datas dans la vue correspondante

        return $this->render('association/single.html.twig', [
            'association' => $association,
            'images' => $galerie,
            'logo' => $logo,
            'video' => $video,
            'banner' => $banner,
            'links' => $links
        ]);
    }

}
