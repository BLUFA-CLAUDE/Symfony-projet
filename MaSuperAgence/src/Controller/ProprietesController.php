<?php
namespace App\Controller;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProprietesController extends AbstractController
{
    public function __construct(ProprieteRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    /**
     * @Route("/biens", name="property_index")
     *
     * @return Response
     */
    public function index(): Response
    {
        
        //$propriete[0]->setSolde(true);
        //$this->em->flush();
        return $this->render('property/index.html.twig', [
            'current_menu'=> 'proprietes'
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property_show", requirements={"slug": "[a-z0-9\-]*"})
     *@param Propriete $property
     * @return Response
     */
    public function show($slug, $id): Response
    {
        $property = $this->repository->find($id);
        if($property->getSlug() !== $slug)
        {
           return $this->redirectToRoute("property_show",[
                'id'=> $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig', [
            'property'=> $property,
            'current_menu'=> 'proprietes'
        ]);
    }
}