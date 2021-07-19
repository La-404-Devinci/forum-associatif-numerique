<?php

namespace App\Form;

use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom de l\'association'])
            ->add('logo', TextType::class, ['label' => 'Logo'])
            ->add('banner', TextType::class, ['label' => 'Bannière'])
            ->add('catchphrase', TextType::class, ['label' => 'Phrase d\'accroche'])
            ->add('description', TextType::class, ['label' => 'Description'])
            ->add('video', TextType::class, ['label' => 'Vidéo'])
            ->add('profile_type', TextType::class, ['label' => 'Profil(s) recherché(s)'])
            ->add('Modifier', SubmitType::class, ['label' => 'Enregistrer les modifications'])
            ->add('Annuler', ResetType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Association::class,
        ]);
    }
}
