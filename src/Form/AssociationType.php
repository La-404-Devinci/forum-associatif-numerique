<?php

namespace App\Form;

use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssociationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'association',
                'required' => true
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                        'Administrateur' => 'ROLE_ADMIN'
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
            ])
            ->add('validated', ChoiceType::class, [
                'label' => 'Mot de passe',
                'choices' => [
                    'Mot de passe à changer' => 0,
                    'Mot de passe changé' => 1
                ],
                'required' => true
            ])
            ->add('logo')
            ->add('status', TextType::class, [
                'label' => 'Statut(s)',
                'required' => false
            ])
            ->add('catchphrase', TextType::class, [
                'label' => 'Phrase d\'accroche',
                'required' => true
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => true
            ])
            ->add('profile_type', TextareaType::class, [
                'label' => 'Profil(s) recherché(s)',
                'required' => false
            ])
            //->add('slug')
            ->add('email', EmailType::class, [
                'label' => 'Adresse Email',
                'required' => true
            ])
            ->add('instagram', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Instagram',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('twitter', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Twitter',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('youtube', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Youtube',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('twitch', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Twitch',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('discord', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Discord',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('facebook', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Facebook',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('linkedin', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'LinkedIn',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://linkedin.fr/association' ]
            ])
            ->add('autre', TextareaType::class, [
                'label' => 'Autres réseaux',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('form', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Formulaire d\'inscription',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Url en https://' ]
            ])
            ->add('projects', TextareaType::class, [
                'label' => 'Projets à venir',
                'required' => true
            ])
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Association::class,
        ]);
    }
}
