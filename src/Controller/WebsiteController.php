<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('pages/home.html.twig', [
        ]);
    }

    /**
     * @Route("/nos-prestations", name="prestations")
     */
    public function prestations(): Response
    {
        return $this->render('pages/nosPrestations.html.twig', [
        ]);
    }

    /**
     * @Route("/qui-sommes-nous", name="aboutUs")
     */
    public function aboutUs(): Response
    {
        return $this->render('pages/quiSommesNous.html.twig', [
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
        ]);
    }

    /**
     * @Route("/notre-organisation", name="organisation")
     */
    public function organisation(): Response
    {
        return $this->render('pages/notreOrganisation.html.twig', [
        ]);
    }

    /**
     * @Route("/nos-engagements", name="engagement")
     */
    public function engagement(): Response
    {
        return $this->render('pages/nosEngagements.html.twig', [
        ]);
    }

    /**
     * @Route("/prestations/isolation-combles", name="isolationCombles")
     */
    public function isolationCombles(): Response
    {
        return $this->render('prestations/isolationCombles.html.twig', [
        ]);
    }
}
