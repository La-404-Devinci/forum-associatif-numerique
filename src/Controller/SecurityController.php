<?php

namespace App\Controller;

use App\Form\ValidatedPasswordFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('profil');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/profil/validated-password", name="app_validated_password")
     */
    public function validatedPassword(Request $request)
    {
        $user = $this->getUser();

        if($user->getValidated()) {
            return $this->redirectToRoute('profil');
        }

        $form = $this->createForm(ValidatedPasswordFormType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            // check if the password has min 7 characters
            $password = $form->get('password')->getData();

            
            // check if password and confirmation are the same
            $confirmation = $form->get('new_password_confirm')->getData();


            if($password === $confirmation) {
                if(strlen($password) > 7) {
                    $password = $this->encoder->hashPassword($user, $password);
                    $user->setPassword($password);
                    $user->setValidated(true);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($user);
                    $entityManager->flush();
                    return $this->redirectToRoute('profil');
                } else {
                    $form->get('password')->addError(new \Symfony\Component\Form\FormError('Le mot de passe doit contenir au moins 7 caractères'));
                }
            } else {
                $form->get('new_password_confirm')->addError(new \Symfony\Component\Form\FormError('Les mots de passe ne correspondent pas'));
            }
        }
        
        return $this->render('security/validated_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
