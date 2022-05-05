<?php

namespace App\DataFixtures;

use App\Entity\Pfe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class PfeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

            $pfe1=new Pfe();
            $pfe1->setTitle("pfe1");
            $pfe1->setStudent("arij");
            //$pfe1->setEntreprise("e1");
            $manager->persist($pfe1);

        $pfe2=new Pfe();
        $pfe2->setTitle("pfe2");
        $pfe2->setStudent("hamza");
        //$pfe2->setEntreprise("e1");
        $manager->persist($pfe2);

        $pfe3=new Pfe();
        $pfe3->setTitle("pfe3");
        $pfe3->setStudent("oumayma");
        //$pfe3->setEntreprise("e3");
        $manager->persist($pfe3);



        $manager->flush();
    }
}
