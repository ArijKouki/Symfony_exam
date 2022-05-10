<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PfeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();
        for($i = 0 ; $i< 100 ; $i++) {
            $pfe = new Pfe();
            $pfe->setStudent($faker->name);
            $pfe->setTitle("Pfe" . $i);

            $repository = $manager->getRepository(Entreprise::class);
            $random = rand(1,49);
            $entreprise =$repository->findOneBy(['id'=>"$random"], []);
            $pfe->setEntreprise($entreprise);

            $manager->persist($pfe);
        }

        $manager->flush();
    }
}
