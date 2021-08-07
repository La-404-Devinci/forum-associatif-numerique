<?php

namespace App\Form;

use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssociationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                        'Administrateur' => 'ROLE_ADMIN'
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('password')
            ->add('logo')
            ->add('status')
            ->add('catchphrase')
            ->add('description')
            ->add('profile_type')
            //->add('slug')
            ->add('email')
            ->add('facebook')
            ->add('instagram')
            ->add('twitter')
            ->add('youtube')
            ->add('twitch')
            ->add('discord')
            ->add('autre')
            ->add('form')
            ->add('projects')
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
