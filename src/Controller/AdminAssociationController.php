<?php

namespace App\Controller;

use App\Entity\Association;
use App\Form\AssociationType;
use App\Repository\AssociationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/association')]
class AdminAssociationController extends AbstractController
{

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    #[Route('/', name: 'admin_association_index', methods: ['GET'])]
    public function index(AssociationRepository $associationRepository): Response
    {
        return $this->render('admin_association/index.html.twig', [
            'associations' => $associationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_association_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $association = new Association();

        $form = $this->createForm(AssociationType::class, $association);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $passwordData =$form->get('password')->getData();
            $password = $this->encoder->hashPassword($association, $passwordData);
            $association->setPassword($password);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($association);
            $entityManager->flush();

            return $this->redirectToRoute('admin_association_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_association/new.html.twig', [
            'association' => $association,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_association_show', methods: ['GET'])]
    public function show(Association $association): Response
    {
        return $this->render('admin_association/show.html.twig', [
            'association' => $association,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_association_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Association $association): Response
    {
        $form = $this->createForm(AssociationType::class, $association);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $passwordData =$form->get('password')->getData();
            $password = $this->encoder->hashPassword($association, $passwordData);
            $association->setPassword($password);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_association_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_association/edit.html.twig', [
            'association' => $association,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_association_delete', methods: ['POST'])]
    public function delete(Request $request, Association $association): Response
    {
        if ($this->isCsrfTokenValid('delete'.$association->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($association);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_association_index', [], Response::HTTP_SEE_OTHER);
    }
}
