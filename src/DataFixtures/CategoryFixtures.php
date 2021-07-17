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

        $category->setName('Informatique');
        $category->setShortDescription('oui description');
        $category->setlogo('Informatique logo ouais');

        $manager->persist($category);

        $manager->flush();
    }
}
