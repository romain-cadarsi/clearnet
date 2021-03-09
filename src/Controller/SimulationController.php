<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SimulationController extends AbstractController
{


    /**
     * @Route("/simulation/isolation", name="simulationIsolation")
     */
    public function simulationIsolation(Request $request, MailerInterface $mailer): Response
    {
        if($request->isMethod('POST')){
            $param = [
                'type_personne' => $request->get('type_personne'),
                'type_bien' => $request->get('type_bien'),
                'type_isolation' => json_decode($request->get('type_isolation')),
                'combles_type' => $request->get('combles_type'),
                'isolation_comble' => $request->get('isolation_comble'),
                'sous_sol' => $request->get('sous_sol'),
                'vide_sanitaire' => $request->get('vide_sanitaire'),
                'code_postal' => $request->get('code_postal'),
                'quantite_personne' => $request->get('quantite_personne'),
                'budget' => $request->get('budget'),
                'sexe' => $request->get('sexe'),
                'prenom' => $request->get('prenom'),
                'nom' => $request->get('nom'),
                'telephone' => $request->get('telephone'),
            ];
            $email = (new Email())
                ->from('energie@clearnetgroup.fr')
                ->subject("Nouvelle simulation d'isolation")
                ->html($this->renderView("simulations/isolation/mail.html.twig",['p' => $param]))
                ->to('energie@clearnetgroup.fr');
            $email->ensureValidity();
            $mailer->send($email);
            return new Response($this->generateUrl('endSimulationIsolation',['numero' => $param['telephone']],UrlGeneratorInterface::ABSOLUTE_URL));

        }


        return $this->render('simulations/isolation/isolation.html.twig', [
        ]);
    }

    /**
     * @Route("/simulation/pro", name="simulationPro")
     */
    public function simulationPro(Request $request, MailerInterface $mailer): Response
    {
        if($request->isMethod('POST')){
            $param = [
                'type' => $request->get('type'),
                'fonction' => $request->get('fonction'),
                'nb_batiment' => $request->get('nb_batiment'),
                'age_batiment' => $request->get('age_batiment'),
                'chauffage_collectif' => $request->get('chauffage_collectif'),
                'supplementaire' => $request->get('supplementaire'),
                'sexe' => $request->get('sexe'),
                'date' => $this->convertDate($request->get('date')),
                'prenom' => $request->get('prenom'),
                'nom' => $request->get('nom'),
                'telephone' => $request->get('telephone'),
                'email' => $request->get('email'),
            ];
            $email = (new Email())
                ->from('energie@clearnetgroup.fr')
                ->subject("Nouvelle simulation Pro")
                ->html($this->renderView("simulations/pro/mail.html.twig",['p' => $param]))
                ->to('energie@clearnetgroup.fr');
            $email->ensureValidity();
            $mailer->send($email);
            return new Response($this->generateUrl('endSimulationPro',['numero' => $param['telephone']],UrlGeneratorInterface::ABSOLUTE_URL));

        }


        return $this->render('simulations/pro/pro.html.twig', [
        ]);
    }

    /**
     * @Route("/simulation/isolation/fin", name="endSimulationIsolation")
     */
    public function endSimulationIsolation(Request $request): Response
    {
        return $this->render("simulations/isolation/endIsolation.html.twig", [ 'numero' => $request->get('numero')
        ]);
    }

    /**
     * @Route("/simulation/pro/fin", name="endSimulationPro")
     */
    public function endSimulationPro(Request $request): Response
    {
        return $this->render("simulations/pro/endPro.html.twig", [ 'numero' => $request->get('numero')
        ]);
    }

    /**
     * @Route("/simulation/isolation/non-eligible", name="nonEligible")
     */
    public function nonEligible(Request $request): Response
    {
        return $this->render("simulations/chauffage/pasEligible.html.twig");
    }

    /**
     * @Route("/simulation/chauffage/fin", name="endSimulationChauffage")
     */
    public function endSimulationChauffage(Request $request): Response
    {
        return $this->render("simulations/chauffage/endChauffage.html.twig", [ 'numero' => $request->get('numero')
        ]);
    }

    /**
     * @Route("/simulation/isolation/{page}", name="simulationIsolationPages", methods={"GET"})
     */
    public function simulationIsolationPage(string $page): Response
    {
        return $this->render("simulations/isolation/$page.html", [
        ]);
    }
    /**
     * @Route("/simulation/chauffage/{page}", name="simulationChauffagePages", methods={"GET"})
     */
    public function simulationChauffagePage(string $page): Response
    {
        return $this->render("simulations/chauffage/$page.html", [
        ]);
    }

    /**
     * @Route("/simulation/chiffre", name="simulationChiffre")
     */
    public function simulationChiffre(Request $request): Response
    {
        return $this->render("simulations/chiffre.html.twig", [
            'title' => $request->get('title'),
            'help' => $request->get('help'),
            'name' => $request->get('name'),
        ]);
    }

    /**
     * @Route("/simulation/chauffage", name="simulationChauffage")
     */
    public function simulationChauffage(Request $request, MailerInterface $mailer): Response
    {
        if($request->isMethod('POST')){
            $param = [
                'type_personne' => $request->get('type_personne'),
                'type_bien' => $request->get('type_bien'),
                'anciennete_bien' => $request->get('anciennete_bien'),
                'type_chauffage' => $request->get('type_chauffage'),
                'precision' => [
                    'electrique' => $request->get('electrique'),
                    'gaz' => $request->get('gaz'),
                    'fioul' => $request->get('fioul')
                ],
                'surface_habitable' => $request->get('surface_habitable'),
                'code_postal' => $request->get('code_postal'),
                'quantite_personne' => $request->get('quantite_personne'),
                'budget' => $request->get('budget'),
                'sexe' => $request->get('sexe'),
                'prenom' => $request->get('prenom'),
                'nom' => $request->get('nom'),
                'telephone' => $request->get('telephone'),
            ];
            $email = (new Email())
                ->from('energie@clearnetgroup.fr')
                ->subject("Nouvelle simulation de changement de chauffage")
                ->html($this->renderView("simulations/chauffage/mail.html.twig",['p' => $param]))
                ->to('energie@clearnetgroup.fr');
            $email->ensureValidity();
            $mailer->send($email);
            return new Response($this->generateUrl('endSimulationChauffage',['numero' => $param['telephone']],UrlGeneratorInterface::ABSOLUTE_URL));

        }


        return $this->render('simulations/chauffage/chauffage.html.twig', [
        ]);
    }

    /**
     * @Route("/send-mail", name="sendMail")
     */
    public function sendMailContact(Request $request, MailerInterface $mailer): Response
    {

        $name = $request->get('widget-contact-form-name');
        $mail = $request->get('widget-contact-form-email');
        $subject = $request->get('widget-contact-form-subject');
        $message = $request->get('widget-contact-form-message');

        $email = (new Email())
            ->from('energie@clearnetgroup.fr')
            ->subject($subject)
            ->html("Vous avez reçu un nouveau message de la part de $name <b>Vous pourrez le recontacter sur son adresse mail <a href='mailto:$mail'> $mail</a>  : <br> <b>$message<b>")
            ->to('energie@clearnetgroup.fr');
        $email->ensureValidity();
        $mailer->send($email);

        return new JsonResponse(['response' => 'success',"message" => 'message envoyé']);
    }

    /**
     * @param Request $request
     */
    public function convertDate(string $dateString): DateTime
    {
        $dateString = substr($dateString, 0, strpos($dateString, '('));
        return new DateTime(date('Y-m-d H:i:s', strtotime($dateString)));
    }


}