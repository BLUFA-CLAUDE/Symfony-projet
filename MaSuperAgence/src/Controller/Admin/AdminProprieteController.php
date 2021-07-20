<?php
namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropriteController extends AbstractController
{

    /**
     *
     * @var ProprieteRepository
     */
    private $repository;
    public function __construct(ProprieteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Propriete $proprietes)
    {
        $proprietes = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig', compact('proprietes'));
    }

    /**
     * @Route("/admin/{id}", name="admin_edit")
     */
    public function edit()
    {
        return $this->render('admin/property/edit.html.twig', compact('proprietes'));
    }
}