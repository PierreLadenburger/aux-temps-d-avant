<?php

namespace App\Controller;

use App\Entity\Enum\TourismeEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
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
