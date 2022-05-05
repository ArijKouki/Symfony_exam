<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $e1=new Entreprise();
        $e1->setDesignation("e1");
        $manager->persist($e1);

        $e2=new Entreprise();
        $e2->setDesignation("e2");
        $manager->persist($e2);

        $e3=new Entreprise();
        $e3->setDesignation("e3");
        $manager->persist($e3);

        $manager->flush();
    }
}
