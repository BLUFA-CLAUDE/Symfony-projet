<?php

namespace App\Controller;

use App\Entity\Zone;
use App\Form\ZoneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZoneController extends AbstractController
{
    #[Route('/Zone/liste', name: 'liste_zone')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $z = new Zone();
        $form = $this->createForm(ZoneType::class, $z, array('action' => $this->generateUrl('add_zone')));
        $data['form']= $form->createView();
        $data['zones'] = $em->getRepository(Zone::class)->findAll();
       
        return $this->render('zone/liste.html.twig', $data);
    }

    #[Route('/Zone/add', name: 'add_zone')]
    public function add(Request $request): Response
    {
        $z = new Zone();

        $form = $this->createForm(ZoneType::class, $z);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $z = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($z);
            $em->flush();
        }
        return $this->redirectToRoute('liste_zone');
    }

    #[Route('/Zone/get/{id}', name: 'zone_get')]
    public function getZone(): Response
    {
        
        return $this->render('zone/liste.html.twig');
    }

    #[Route('/pays/update', name: 'updatepays')]
    public function update(): Response
    {
        return $this->render('zone/liste.html.twig');
    }

}
