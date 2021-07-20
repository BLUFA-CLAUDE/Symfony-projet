<?php
namespace App\Controller;

use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     * @return Response
     */
    public function index(ProprieteRepository $repository): Response
    {
        $proprite = $repository->findLatest();
        return $this->render('pages/home.html.twig',[
            'proprietes' =>$proprite
        ]);
    }

}