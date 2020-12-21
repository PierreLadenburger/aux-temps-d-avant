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
	 * @param Request $request
	 * @param \Swift_Mailer $mailer
	 * @return Response
	 */
    public function index(Request $request, \Swift_Mailer $mailer): Response
    {
        $contact = new Contact();
        $formulaire = $this->createForm(ContactFormType::class, $contact);
        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
			$contact = $formulaire->getData();
	        $this->entityManager->persist($contact);
	        $this->entityManager->flush();
	        $message = (new \Swift_Message('Nouveau message sur le site internet'))
	                    ->setFrom($contact->getEmail())
		                ->addReplyTo($contact->getEmail())
	                    ->setTo('carinecura@gmail.com')
		                ->setBody($this->renderView('commun/email.html.twig', ['contact' => $contact]), 'text/html')
		                ->addPart($this->renderView('commun/email.txt.twig', ['contact' => $contact]), 'text/plain');
	        $mailer->send($message);
	        unset($contact);
	        unset($formulaire);
	        $contact = new Contact();
	        $formulaire = $this->createForm(ContactFormType::class, $contact);
	        $this->addFlash('success', 'Message envoyé');
	        $this->redirectToRoute('contact');
        }
        return $this->render('contact/contact.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);
    }
}
