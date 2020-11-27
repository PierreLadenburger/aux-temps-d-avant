<?php

namespace App\Controller;

use App\Entity\Enum\TourismeEnum;
use App\Repository\TourismeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TourismeController extends AbstractController
{
	/**
	 * @Route("/tourisme/{categorie}", name="tourisme")
	 * @param $categorie
	 * @param TourismeRepository $tourismeRepository
	 * @return Response
	 */
    public function index($categorie, TourismeRepository  $tourismeRepository): Response
    {
		$tourismes = $tourismeRepository->findBy(['categorie' => $categorie]);
        return $this->render('tourisme/tourisme.html.twig', [
            'tourismes' => $tourismes,
	        'categorie' => TourismeEnum::getTypeName($categorie)
        ]);
    }
}
