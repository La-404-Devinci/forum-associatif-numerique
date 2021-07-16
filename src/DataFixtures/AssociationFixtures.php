<?php

namespace App\DataFixtures;

use App\Entity\Association;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AssociationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $association = new Association();

        $association->setName('La 404 DeVinci');
        $association->setPassword('password');
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
