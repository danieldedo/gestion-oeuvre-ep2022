<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $cat1 = new Categorie();
        $cat1->setNomcategorie("Trésors Royaux");
        $manager->persist($cat1);

        
        $cat1 = new Categorie();
        $cat1->setNomcategorie("Art Contemporains");
        $manager->persist($cat1);

        $manager->flush();
    }
}
