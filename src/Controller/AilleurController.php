<?php

namespace App\Controller;

use App\Repository\AilleurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AilleurController extends AbstractController
{
    /**
     * @Route("/ailleur", name="ailleur")
     */
    public function index(AilleurRepository $ailleurRepository): Response
    {
    	$ailleurs = $ailleurRepository->findAll();
        return $this->render('ailleur/ailleur.html.twig', [
			'ailleurs' => $ailleurs
        ]);
    }
}
