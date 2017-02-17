<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InscriptionClientController extends Controller
{

    /**
     * @Route("/inscriptionClient", name="inscriptionClient")
     */
    public function inscriptionClientAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\InscriptionClientDTO(); // crée un DTO
        $form = $this->createForm(\AppBundle\Form\InscriptionClientType::class, $dto); // crée le formulaire

        $form->handleRequest($req); // applique le form binding

        if ($form->isSubmitted() && $form->isValid())
        {
            // faire un service
            // ajout de l'utilisateur en BDD
            $user = new \AppBundle\Entity\Client();
            $user->setLogin($dto->getLogin());
            $user->setMdp($dto->getMotDePasse1());
            $user->setMail($dto->getMail());
            $user->setNom($dto->getNom());
            $user->setPrenom($dto->getPrenom());
            $user->setTelephone($dto->getTelephone());

            $this->get("client_service")->inscrire($user);

//            return $this->render("::message.html.twig", array("message" => "inscription réussie"));
            return $this->redirectToRoute('login');
        }

        // ici le formulaire n'a pas été posté ou est invalide
        return $this->render("AppBundle:InscriptionClient:inscription_client.html.twig", array("monForm" => $form->createView()));
    }

    /**
     * @Route("/login", name="login")
     */
    public function connexionClientAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('accueil');
        }
        $authentivationUtils = $this->get('security.authentication_utils');
        $error = $authentivationUtils->getLastAuthenticationError();
        $lastUsername = $authentivationUtils->getLastUsername();
        return $this->render('AppBundle:Connection:connection.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error
        ));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function deconnexionClientAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        // pas de formulaire
        // on vide juste les sessions
        $req->getSession()->clear();
        // page de redirection 
        return $this->redirectToRoute('accueil');
    }

}
