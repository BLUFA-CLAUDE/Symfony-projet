<?php

namespace App\Controller;

use App\Entity\PointSurveillance;
use App\Form\PointSurveillanceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PointSurveillanceController extends AbstractController
{
    #[Route('/Point_surveillance/liste', name: 'liste_surveillance')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $ps = new PointSurveillance();
        $form = $this->createForm(PointSurveillanceType::class, $ps, array('action' => $this->generateUrl('add_ps')));
        $data['form']= $form->createView();
        $data['pointsurveillances'] = $em->getRepository(PointSurveillance::class)->findAll();

        return $this->render('point_surveillance/liste.html.twig', $data);
    }

    #[Route('/Point_surveillance/add', name: 'add_ps')]
    public function add(Request $request): Response
    {
        $ps = new PointSurveillance();

        $form = $this->createForm(PointSurveillanceType::class, $ps);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $ps = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($ps);
            $em->flush();
        }
        return $this->redirectToRoute('liste_surveillance');
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
