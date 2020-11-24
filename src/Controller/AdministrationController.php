<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Repository\ChambreRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class AdministrationController extends AbstractController
{
    /**
     * @Route("/administration", name="administration")
     */
    public function index(): Response
    {
        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }

    /**
     * @Route("/administration/mise-a-jour/reservation, name="administration_reservation")
     */
    public function administration_reservation(Request  $request, ReservationRepository  $reservationRepository,
                                               ChambreRepository $chambreRepository) {
        $em = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) {
            $chambre = $chambreRepository->findOneBy(['nom' => $request->request->get('chambre')]);
            $reservation = $reservationRepository->findOneBy(['chambre' => $chambre, 'date' => new \DateTime($request->request->get('date'))]);
            if ($reservation) {

            }
        }
    }

    /**
     * @Route("/administration/forge", name="administration_forge")
     * @param Request $request
     * @param ReservationRepository $reservationRepository
     * @param ChambreRepository $chambreRepository
     * @return Response
     * @throws \Exception
     */
    public function administration_forge(Request  $request, ReservationRepository  $reservationRepository,
                                         ChambreRepository $chambreRepository): Response
    {
        $em = $this->getDoctrine()->getManager();
        $reservations = $reservationRepository->recupererReservations();
        if ($request->isMethod('POST')) {

            $date_debut = new \DateTime($request->request->get('date_debut'));
            $date_fin = new \DateTime($request->request->get('date_fin'));
            $date_fin->modify("+ 1 day");
            $periode = new \DatePeriod($date_debut, new \DateInterval('P1D'), $date_fin);
            $chambre = $chambreRepository->findOneBy(['id' => 1]);
            foreach ($periode as $cle => $valeur) {
              $reservation = new Reservation();
              $reservation->setDate($valeur);
              $reservation->setChambre($chambre);
              $em->persist($reservation);
            }
            $em->flush();
        }
        return $this->render('administration/forge.html.twig', [
          'reservations' => $reservations,
        ]);
    }
}
