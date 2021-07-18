<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    // création de fausses données

    public function load(ObjectManager $manager)
    {
        $category = new Category();

        $category->setName('BDE & Clubs ecoles');
        $category->setDescription('Ce sont les représentants du pôle et de ses écoles. Ils sont là pour intégrer au mieux les étudiants.');

        $manager->persist($category);

        $manager->flush();
    }
}
