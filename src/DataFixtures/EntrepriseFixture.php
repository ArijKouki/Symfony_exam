<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EntrepriseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for($i = 0 ; $i< 50 ; $i++) {
            $entreprise = new Entreprise();
            $entreprise->setDesignation($faker->company);
            $manager->persist($entreprise);
        }

        $manager->flush();
    }
}
