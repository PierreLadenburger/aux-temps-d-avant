<?php

namespace App\Controller;

use App\Repository\ChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre/{diminutif}", name="chambre")
     */
    public function index($diminutif, ChambreRepository  $chambreRepository): Response
    {
        $chambre = $chambreRepository->findOneBy(['diminutif' => $diminutif]);
        if ($chambre != null) {
          return $this->render('chambre/index.html.twig', [
            'chambre' => $chambre,
          ]);
        } else {
          return $this->redirectToRoute('accueil');
        }

    }
}
