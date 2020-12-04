<?php

namespace App\Controller;

use App\Commun\GoogleMaps;
use App\Entity\Ailleur;
use App\Entity\Livre;
use App\Entity\Reservation;
use App\Entity\Restaurant;
use App\Entity\Tourisme;
use App\Form\AilleurFormType;
use App\Form\LivreFormType;
use App\Form\RestaurantFormType;
use App\Form\TourismeFormType;
use App\Repository\AilleurRepository;
use App\Repository\ChambreRepository;
use App\Repository\LivreRepository;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use App\Repository\TourismeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class AdministrationController extends AbstractController
{
	private $googleMaps;
	private $entityManager;

	function __construct(EntityManagerInterface $entityManager)
	{
		$this->googleMaps = new GoogleMaps();
		$this->entityManager =  $entityManager;

	}

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
     * @Route("/administration/mise-a-jour/reservation", methods={"POST", "GET"}, name="administration_reservation")
     */
    public function administration_reservation(Request  $request, ReservationRepository  $reservationRepository,
                                               ChambreRepository $chambreRepository) {
        if ($request->isXmlHttpRequest()) {
            $chambre = $chambreRepository->findOneBy(['diminutif' => $request->request->get('chambre')]);
            $reservation = $reservationRepository->findOneBy(['chambre' => $chambre, 'date' => new \DateTime($request->request->get('date'))]);
            if (!$reservation) {
            	$nouvelleReservation = new Reservation();
            	$nouvelleReservation->setChambre($chambre);
            	$nouvelleReservation->setDate(new \DateTime($request->request->get('date')));
            	$this->entityManager->persist($nouvelleReservation);
            } else {
            	$this->entityManager->remove($reservation);
            }
        }
	    $this->entityManager->flush();
	    return new JsonResponse(['statut' => 'ok']);
    }

	/**
	 * @Route("/administration/restaurant", name="administration_restaurant")
	 * @param Request $request
	 * @param RestaurantRepository $restaurantRepository
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function administration_restaurant(Request $request,
	                                          RestaurantRepository  $restaurantRepository) {
		$restaurant = new Restaurant();
		$restaurants = $restaurantRepository->findAll();
		$formulaire = $this->createForm(RestaurantFormType::class, $restaurant);
		$formulaire->handleRequest($request);
		if ($formulaire->isSubmitted() && $formulaire->isValid()) {
			$restaurant = $formulaire->getData();
			$adresse = $this->googleMaps->recupererGoogleMapsAdresse($restaurant->getAdresse());
			$restaurant->setAdresse($adresse['results'][0]['formatted_address']);
			$restaurant->setLat($adresse['results'][0]['geometry']['location']['lat']);
			$restaurant->setLng($adresse['results'][0]['geometry']['location']['lng']);
			$this->entityManager->persist($restaurant);
			$this->entityManager->flush();
			return $this->redirectToRoute('administration_restaurant');
		}

		return $this->render('administration/restaurant.html.twig', [
			'formulaire' => $formulaire->createView(),
			'restaurants' => $restaurants
		]);
	}

	/**
	 * @Route("/administration/restaurant/suppression/{id}", name="administration_restaurant_suppression")
	 */
	public function administration_restaurant_suppression($id, RestaurantRepository $restaurantRepository) {
		//$em = $this->getDoctrine()->getManager();
		$restaurant = $restaurantRepository->findOneBy(['id' => $id]);
		$this->entityManager->remove($restaurant);
		$this->entityManager->flush();
		return $this->redirectToRoute('administration_restaurant');
	}

	/**
	 * @Route("/administration/livre", name="administration_livre")
	 * @param Request $request
	 * @param LivreRepository $livreRepository
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function administration_livre(Request $request,
                                         LivreRepository $livreRepository) {
		$livre = new Livre();
		$livres = $livreRepository->findBy([], ['date' => 'desc']);
		$formulaire = $this->createForm(LivreFormType::class, $livre);
		$formulaire->handleRequest($request);
		if ($formulaire->isSubmitted() && $formulaire->isValid()) {
			$livre = $formulaire->getData();
			$this->entityManager->persist($livre);
			$this->entityManager->flush();
			return $this->redirectToRoute('administration_livre');
		}
		return $this->render('administration/livre.html.twig', [
			'formulaire' => $formulaire->createView(),
			'livres' => $livres
		]);
	}

	/**
	 * @Route("/administration/livre/suppression/{id}", name="administration_livre_suppression")
	 * @param $id
	 * @param LivreRepository $livreRepository
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function administration_livre_suppression($id, LivreRepository $livreRepository) {
		$livre = $livreRepository->findOneBy(['id' => $id]);
		$this->entityManager->remove($livre);
		$this->entityManager->flush();
		return $this->redirectToRoute('administration_livre');
	}

	/**
	 * @Route("/administration/ailleur", name="administration_ailleur")
	 * @param Request $request
	 * @param LivreRepository $livreRepository
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function administration_ailleur(Request $request,
	                                     AilleurRepository $ailleurRepository)
	{
		$ailleur = new Ailleur();
		$ailleurs = $ailleurRepository->findAll();
		$formulaire = $this->createForm(AilleurFormType::class, $ailleur);
		$formulaire->handleRequest($request);
		if ($formulaire->isSubmitted() && $formulaire->isValid()) {
			$ailleur = $formulaire->getData();
			$adresse = $this->googleMaps->recupererGoogleMapsAdresse($ailleur->getAdresse());
			$ailleur->setAdresse($adresse['results'][0]['formatted_address']);
			$ailleur->setLat($adresse['results'][0]['geometry']['location']['lat']);
			$ailleur->setLng($adresse['results'][0]['geometry']['location']['lng']);
			$this->entityManager->persist($ailleur);
			$this->entityManager->flush();
			return $this->redirectToRoute('administration_ailleur');
		}
		return $this->render('administration/ailleur.html.twig', [
			'formulaire' => $formulaire->createView(),
			'ailleurs' => $ailleurs
		]);
	}

	/**
	 * @Route("/administration/ailleur/suppression/{id}", name="administration_ailleur_suppression")
	 * @param $id
	 * @param AilleurRepository $ailleurRepository
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function administration_ailleur_suppression($id, AilleurRepository $ailleurRepository) {
		$ailleur = $ailleurRepository->findOneBy(['id' => $id]);
		$this->entityManager->remove($ailleur);
		$this->entityManager->flush();
		return $this->redirectToRoute('administration_ailleur');
	}

	/**
	 * @Route("/administration/tourisme", name="administration_tourisme")
	 * @param Request $request
	 * @param LivreRepository $livreRepository
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
	 */
	public function administration_tourisme(Request $request,
	                                       TourismeRepository $tourismeRepository)
	{
		$tourisme = new Tourisme();
		$tourismes = $tourismeRepository->findAll();
		$formulaire = $this->createForm(TourismeFormType::class, $tourisme);
		$formulaire->handleRequest($request);
		if ($formulaire->isSubmitted() && $formulaire->isValid()) {
			$tourisme = $formulaire->getData();
			$adresse = $this->googleMaps->recupererGoogleMapsAdresse($tourisme->getAdresse());
			$tourisme->setAdresse($adresse['results'][0]['formatted_address']);
			$tourisme->setLat($adresse['results'][0]['geometry']['location']['lat']);
			$tourisme->setLng($adresse['results'][0]['geometry']['location']['lng']);
			$this->entityManager->persist($tourisme);
			$this->entityManager->flush();
			return $this->redirectToRoute('administration_tourisme');
		}
		return $this->render('administration/tourisme.html.twig', [
			'formulaire' => $formulaire->createView(),
			'tourismes' => $tourismes
		]);
	}

    /**
     * @Route("/administration/{diminutif}", name="administration_chambre")
     * @param Request $request
     * @param ReservationRepository $reservationRepository
     * @param ChambreRepository $chambreRepository
     * @return Response
     * @throws \Exception
     */
    public function administration_forge($diminutif, Request  $request, ReservationRepository  $reservationRepository,
                                         ChambreRepository $chambreRepository): Response
    {
	    $chambre = $chambreRepository->findOneBy(['diminutif' => $diminutif]);
        $reservations = $reservationRepository->recupererReservations($chambre);
        /*if ($request->isMethod('POST')) {

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
        }*/
        return $this->render('administration/' . $diminutif . '.html.twig', [
        	'reservations' => $reservations,
	        'chambre' => $chambre
        ]);
    }
}
