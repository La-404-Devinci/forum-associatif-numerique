<?php

namespace App\DataFixtures;

use App\Entity\Association;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AssociationFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // création de fausses données

    public function load(ObjectManager $manager)
    {
        $association = new Association();

        $password = $this->encoder->hashPassword($association, 'password');

        $association->setName('IIMPACT');
        $association->setPassword($password);
        $association->setRoles(['ROLE_USER']);
        $association->setLogoColor('c\'est le logo');
        $association->setBanner('c\'est la bannière');
        $association->setStatus('/');
        $association->setCatchphrase('c\'est la phrase d\'accroche');
        $association->setDescription('c\'est la description');
        $association->setProfileType('MOTIVE ET DYNAMIQUE OUAIS');
        $association->setVideo('c\'est la vidéo');
        $manager->persist($association);

        $manager->flush();
    }
}
