<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
	/**
	 * @Route("/livre", name="livre-d-or")
	 * @param LivreRepository $livreRepository
	 * @return Response
	 */
    public function index(LivreRepository  $livreRepository): Response
    {
    	$livres = $livreRepository->findBy([], ['date' => 'desc']);
        return $this->render('livre/livre.html.twig', [
            'livres' => $livres,
        ]);
    }
}
