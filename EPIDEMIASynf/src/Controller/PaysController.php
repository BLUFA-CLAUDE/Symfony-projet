<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaysController extends AbstractController
{
    #[Route('/Pays/liste', name: 'liste_pays')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $p = new Pays();
        $form = $this->createForm(PaysType::class, $p, array('action' => $this->generateUrl('add_pays')));
        $data['form']= $form->createView();
        $data['pays'] = $em->getRepository(Pays::class)->findAll();
        return $this->render('pays/liste.html.twig', $data);
    }

    #[Route('/Pays/add', name: 'add_pays')]
    public function add(Request $request): Response
    {
        $p = new Pays;

        $form = $this->createForm(PaysType::class, $p);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $p = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
        }
        return $this->redirectToRoute('liste_pays');
    }

    #[Route('/Produit/get/{id}', name: 'pays_get')]
    public function getPays(): Response
    {
        
        return $this->render('pays/liste.html.twig');
    }

    #[Route('/pays/update', name: 'updatepays')]
    public function update(): Response
    {
        return $this->render('pays/liste.html.twig', [
            'controller_name' => 'Jean Claude',
        ]);
    }

    
}
