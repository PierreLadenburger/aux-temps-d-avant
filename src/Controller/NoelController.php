<?php

namespace App\Controller;

use App\Repository\NoelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NoelController extends AbstractController
{
	/**
	 * @Route("/noel", name="noel")
	 * @param NoelRepository $noelRepository
	 * @return Response
	 */
    public function index(NoelRepository $noelRepository): Response
    {
    	$photos = $noelRepository->findAll();
        return $this->render('noel/noel.html.twig', [
            'photos' => $photos,
        ]);
    }
}
