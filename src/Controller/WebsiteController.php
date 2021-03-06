<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/zone-d-intervention", name="zoneDintervention")
     */
    public function zoneDintervention(): Response
    {
        return $this->render('pages/carteDintervention.html.twig', [
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
     * @Route("/ils-nous-font-confiance", name="ilsNousFontConfiance")
     */
    public function ilsNousFontConfiance(): Response
    {
        return $this->render('pages/ilsNousFontConfiance.html.twig', [
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
    /**
     * @Route("/prestations/calorifugeage", name="calorifugeage")
     */
    public function calorifugeage(): Response
    {
        return $this->render('prestations/calorifugeage.html.twig', [
        ]);
    }
    /**
     * @Route("/prestations/economiseur-d-eau", name="economiseurDeau")
     */
    public function economiseurDeau(): Response
    {
        return $this->render('prestations/economiseurDeau.html.twig', [
        ]);
    }
    /**
     * @Route("/prestations/flocage", name="flocage")
     */
    public function flocage(): Response
    {
        return $this->render('prestations/flocage.html.twig', [
        ]);
    }
    /**
     * @Route("/prestations/matelas-isolant", name="matelasIsolant")
     */
    public function matelasIsolant(): Response
    {
        return $this->render('prestations/matelasIsolant.html.twig', [
        ]);
    }

    /**
     * @Route("/prestations/eco-regulateur", name="ecoRegulateur")
     */
    public function ecoRegulateur(): Response
    {
        return $this->render('prestations/ecoRegulateur.html.twig', [
        ]);
    }

    /**
     * @Route("/prestations/organe-de-chauffe", name="organeDeChauffe")
     */
    public function organeDeChauffe(): Response
    {
        return $this->render('prestations/organeDeChauffe.html.twig', [
        ]);
    }

    /**
     * @Route("/prestations/recuperateur-chaleur-groupe-froid", name="recuperateurChaleurGroupeFroid")
     */
    public function recuperateurDeChaleurSurGroupeFroid(): Response
    {
        return $this->render('prestations/recuperateurChaleurGroupeFroid.html.twig', [
        ]);
    }

    /**
     * @Route("/prestations/isolation-thermique-interieur", name="isolationThermiqueInterieur")
     */
    public function isolationThermiqueInterieur(Request $request): Response
    {
        return $this->render('prestations/isolationThermiqueInterieur.html.twig', [
            'client' => $request->get('client')
        ]);
    }

    /**
     * @Route("/prestations/isolation-thermique-interieur-pro", name="isolationThermiqueInterieurPro")
     */
    public function isolationThermiqueInterieurPro(Request $request): Response
    {
        return $this->render('prestations/isolationThermiqueInterieurPro.html.twig', [
            'client' => $request->get('client')
        ]);
    }

    /**
     * @Route("/prestations/isolation-thermique-exterieur", name="isolationThermiqueExterieur")
     */
    public function isolationThermiqueExterieur(Request $request): Response
    {
        return $this->render('prestations/isolationThermiqueExterieur.html.twig', [
            'client' => $request->get('client')
        ]);
    }

    /**
     * @Route("/prestations/pompe-a-chaleur", name="pompeAChaleur")
     */
    public function pompeAChaleur(Request $request): Response
    {
        return $this->render('prestations/pompeAChaleur.html.twig', [
            'client' => $request->get('client')
        ]);
    }

    /**
     * @Route("/prestations/production-eau-chaude-sanitaire", name="productionEauChaudeSanitaire")
     */
    public function productionEauChaudeSanitaire(Request $request): Response
    {
        return $this->render('prestations/productionEauChaudeSanitaire.html.twig', [
            'client' => $request->get('client')
        ]);
    }

    /**
     * @Route("/particulier", name="particulier")
     */
    public function particulier(): Response
    {
        return $this->render('pages/particulier.html.twig', [
        ]);
    }

    /**
     * @Route("/pro/bailleur-sociaux", name="bailleur")
     */
    public function bailleur(): Response
    {
        return $this->render('pages/bailleur.html.twig', [
        ]);
    }
    /**
     * @Route("/pro/syndic-de-copropriete", name="syndic")
     */
    public function syndic(): Response
    {
        return $this->render('pages/syndic.html.twig', [
        ]);
    }

    /**
     * @Route("/pro/collectivite", name="collectivite")
     */
    public function collectivite(): Response
    {
        return $this->render('pages/collectivite.html.twig', [
        ]);
    }

    /**
     * @Route("/pro/secteur-tertiaire", name="tertiaire")
     */
    public function tertiaire(): Response
    {
        return $this->render('pages/tertiaire.html.twig', [
        ]);
    }

    /**
     * @Route("/pro/organisme-de-sante", name="sante")
     */
    public function sante(): Response
    {
        return $this->render('pages/sante.html.twig', [
        ]);
    }

    /**
     * @Route("/pro", name="pro")
     */
    public function pro(): Response
    {
        return $this->render('pages/pro.html.twig', [
        ]);
    }


}
