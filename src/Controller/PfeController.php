<?php

namespace App\Controller;

use App\Entity\Pfe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PfeController extends AbstractController
{
    #[Route('/pfe/add/{title}/{student}/{entreprise}', name: 'pfe.add')]
    public function index(ManagerRegistry $doctrine,$title,$student,$entreprise): Response
    {
        $entityManager=$doctrine->getManager();
        $pfe=new Pfe();
        $pfe->setTitle($title);
        $pfe->setStudent($student);
        $pfe->setEntreprise($entreprise);
        $entityManager->persist($pfe);
        $entityManager->flush();

        return $this->render('pfe/index.html.twig');
    }
}
