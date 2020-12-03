<?php

namespace App\Controller;

use App\Entity\Enum\TourismeEnum;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
	/**
	 * @Route("/", name="accueil")
	 * @param PhotoRepository $photoRepository
	 * @return Response
	 */
    public function index(PhotoRepository  $photoRepository): Response
    {
    	$photos = $photoRepository->findBy(['chambre' => null]);
        return $this->render('accueil/index.html.twig', [
            'photos' => $photos
        ]);
    }

    /**
     *
     */
    public function afficherCategories() {

	    $categories = TourismeEnum::getAvailableTypes();
	    $categories2 = [];
	    $i = 0;
	    foreach ($categories as $categorie) {
		    $categories2[$i]['nom'] = TourismeEnum::getTypeName($categorie);
		    $categories2[$i]['categorie'] = $categorie;
		    $i++;
	    }
	    return $this->render('commun/categories.html.twig', [
			'categories' => $categories2
	    ]);
    }
}
