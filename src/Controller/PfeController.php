<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use App\Form\PfeFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PfeController extends AbstractController
{
    #[Route('/pfe/add', name: 'pfe.add')]
    public function add(ManagerRegistry $doctrine,Request $request): Response
    {
        $pfe=new Pfe();
        $form=$this->createForm(PfeFormType::class,$pfe);
        $form->handleRequest($request);
        if($form->isSubmitted()){
        $entityManager=$doctrine->getManager();
        $entityManager->persist($pfe);
        #$this->addFlash('success',$pfe->getTitle()." a été ajouté avec succés .");
        $entityManager->flush();
        return $this->render("pfe/details.html.twig",['pfe'=>$pfe]);
        }
        return $this->render('pfe/form.html.twig',['form'=>$form->createView()]);
    }
    #[Route('/entreprise/view', name: 'entreprise.view')]
    public function view(ManagerRegistry $doctrine):Response{
        $repository=$doctrine->getRepository(Entreprise::class);
        $entreprises=$repository->findAll();
        return $this->render('pfe/view.html.twig',['entreprises'=>$entreprises]);
    }
}
