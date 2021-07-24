<?php

namespace App\Form;

use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
                'required' => false
            ])
            ->add('image', FileType::class, [
                'label' => 'Image pour galerie',
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
                'label' => 'Adresse Email',
                'required' => true
            ])
            ->add('instagram', TextType::class, [
                'label' => 'Instagram',
                'required' => false
            ])
            ->add('twitter', TextType::class, [
                'label' => 'Twitter',
                'required' => false
            ])
            ->add('youtube', TextType::class, [
                'label' => 'Youtube',
                'required' => false
            ])
            ->add('twitch', TextType::class, [
                'label' => 'Twitch',
                'required' => false
            ])
            ->add('discord', TextType::class, [
                'label' => 'Discord',
                'required' => false
            ])
            ->add('facebook', TextType::class, [
                'label' => 'Facebook',
                'required' => false
            ])
            ->add('autre', TextareaType::class, [
                'label' => 'Autres réseaux',
                'required' => false
            ])
            ->add('projects', TextareaType::class, [
                'label' => 'Projets à venir',
                'required' => true
            ])
            ->add('status', TextType::class, [
                'label' => 'Statut(s)',
                'required' => false
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
