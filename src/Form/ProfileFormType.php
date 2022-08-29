<?php

namespace App\Form;

use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\File;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'association',
                'required' => true
            ])
            ->add('logo', FileType::class, [
                'mapped' => false,
                'label' => 'Logo',
                'required' => false
            ])
            ->add('thumbnail', HiddenType::class, [
                'mapped' => true,
                'required' => false
            ])
            ->add('banner', FileType::class, [
                'label' => 'Bannière',
                'mapped' => false,
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
            ->add('video', FileType::class, [
                'mapped' => false,
                'label' => 'Vidéo',
                'required' => false,
            ])
            ->add('image', FileType::class, [
                'label' => 'Ajouter des images',
                'mapped' => false,
                'required' => false,
                'multiple' => 'multiple'
            ])
            ->add('profile_type', TextareaType::class, [
                'label' => 'Profil(s) recherché(s)',
                'required' => false
            ])
            ->add('Modifier', SubmitType::class, ['label' => 'Enregistrer les modifications'])
            ->add('Annuler', ResetType::class)
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'required' => true
            ])
            ->add('instagram', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Instagram',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://instagram.com/association' ]
            ])
            ->add('twitter', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Twitter',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://twitter.com/association' ]
            ])
            ->add('youtube', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Youtube',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://youtube.com/association' ]
            ])
            ->add('twitch', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Twitch',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://twitch.tv/association' ]
            ])
            ->add('discord', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Discord',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://discord.gg/association' ]
            ])
            ->add('linkedin', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'LinkedIn',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://linkedin.fr/association' ]
            ])
            ->add('facebook', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Facebook',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://facebook.com/assocation' ]
            ])
            ->add('autre', TextareaType::class, [
                'label' => 'Autres réseaux',
                'required' => false,
                'attr'=> [ 'placeholder' => 'Urls en https://, séparées par une virgule' ]
            ])
            ->add('projects', TextareaType::class, [
                'label' => 'Projets à venir',
                'required' => true
            ])
            ->add('status', TextType::class, [
                'label' => 'Statut(s)',
                'required' => false,
                'attr'=> [ 'placeholder' => 'AP, AVSO, FFSU, BDE, Club école...' ]
            ])
            ->add('form', UrlType::class, [
                'default_protocol' => 'https',
                'label' => 'Formulaire d\'inscription',
                'required' => false,
                'attr'=> [ 'placeholder' => 'https://forms.gle/exemple' ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Association::class,
        ]);
    }
}
