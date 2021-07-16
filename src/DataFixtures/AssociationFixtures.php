<?php

namespace App\DataFixtures;

use App\Entity\Association;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AssociationFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $association = new Association();

        $password = $this->encoder->encodePassword($association, 'password');

        $association->setName('La 404 DeVinci');
        $association->setPassword($password);
        $association->setRoles(['ROLE_USER']);
        $association->setLogoColor('aled');
        $association->setBanner('aled');
        $association->setStatus('/');
        $association->setCatchphrase('aled');
        $association->setDescription('aled');
        $association->setProfileType('MOTIVE ET DYNAMIQUE OUAIS');
        $association->setCategory('informatique');

        $manager->persist($association);

        $manager->flush();
    }
}
