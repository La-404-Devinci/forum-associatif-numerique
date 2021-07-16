<?php

namespace App\DataFixtures;

use App\Entity\Association;
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
        $association->setLogoColor('aled');
        $association->setBanner('aled');
        $association->setStatus('/');
        $association->setCatchphrase('aled');
        $association->setDescription('aled');
        $association->setProfileType('MOTIVE ET DYNAMIQUE OUAIS');
        $association->setCategory('club école');

        $manager->persist($association);

        $manager->flush();
    }
}
