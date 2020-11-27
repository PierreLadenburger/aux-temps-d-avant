<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
	/**
	 * @Route("/restaurant", name="restaurant")
	 * @param RestaurantRepository $restaurantRepository
	 * @return Response
	 */
    public function index(RestaurantRepository $restaurantRepository): Response
    {
    	$restaurants = $restaurantRepository->findAll();
        return $this->render('restaurant/restaurant.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }
}
