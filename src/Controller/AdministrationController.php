<?php

namespace App\Controller;

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
   * @Route("/administration/forge", name="administration_forge")
   */
  public function administration_forge(Request  $request): Response
  {
    if ($request->isMethod('POST')) {

      $date_debut = new \DateTime($request->request->get('date_debut'));
      $date_fin = new \DateTime($request->request->get('date_fin'));


    }
    return $this->render('administration/forge.html.twig', [
      'controller_name' => 'AdministrationController',
    ]);
  }
}
