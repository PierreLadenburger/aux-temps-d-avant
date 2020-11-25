<?php

namespace App\Controller;

use App\Repository\ChambreRepository;
use App\Repository\PhotoRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre/{diminutif}", name="chambre")
     */
    public function index($diminutif, ChambreRepository  $chambreRepository,
						  ReservationRepository  $reservationRepository,
						  PhotoRepository $photoRepository): Response
    {
        $chambre = $chambreRepository->findOneBy(['diminutif' => $diminutif]);
	    $reservations = $reservationRepository->recupererReservations($chambre);
	    $photos = $photoRepository->findBy(['chambre' => $chambre]);
	    return $this->render('chambre/'. $diminutif . '.html.twig', [
		    'chambre' => $chambre,
		    'reservations' => $reservations,
		    'photos' => $photos
	    ]);
    }
}
