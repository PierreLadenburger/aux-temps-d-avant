<?php

namespace App\Controller;

use App\Commun\GoogleMaps;
use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
	private $entityManager;

	function __construct(EntityManagerInterface $entityManager)
	{
		$this->googleMaps = new GoogleMaps();
		$this->entityManager =  $entityManager;

	}

    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        $contact = new Contact();
        $formulaire = $this->createForm(ContactFormType::class, $contact);
        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
			$contact = $formulaire->getData();
	        $this->entityManager->persist($contact);
	        $this->entityManager->flush();
	        $this->addFlash('success', 'Message envoyé');
	        $this->redirectToRoute('contact');
        }
        return $this->render('contact/contact.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);
    }
}
