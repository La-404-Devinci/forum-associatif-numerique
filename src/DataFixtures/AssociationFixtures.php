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
        $association->setLogo('c\'est le logo');
        $association->setStatus('/');
        $association->setCatchphrase('c\'est la phrase d\'accroche');
        $association->setDescription('c\'est la description');
        $association->setProfileType('MOTIVE ET DYNAMIQUE OUAIS');
        $association->setThumbnail('c\'est le thumbnail');
        $association->setFacebook('c\'est le facebook');
        $association->setInstagram('c\'est le instagram');
        $association->setTwitter('c\'est le twitter');
        $association->setYoutube('c\'est le youtube');
        $association->setTwitch('c\'est le twitch');
        $association->setDiscord('c\'est le discord');
        $manager->persist($association);

        $manager->flush();
    }
}
