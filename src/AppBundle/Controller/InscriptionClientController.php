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
            return  $this->redirectToRoute('connexionClient');
        }

        // ici le formulaire n'a pas été posté ou est invalide
        return $this->render("AppBundle:InscriptionClient:inscription_client.html.twig", array("monForm" => $form->createView()));
    }

    /**
     * @Route("/connexionClient", name="connexionClient")
     */
    public function connexionClientAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\LoginClientDTO; // crée un DTO de type Login
        $form = $this->createForm(\AppBundle\Form\LoginClientType::class, $dto); // crée le formulaire
        $form->handleRequest($req); // applique le form binding
        $message = "";
        if ($form->isSubmitted() && $form->isValid())
        {
            // le formulaire est valide
            // il faut vérifier que le login / mot de passe existe bien dans la base
            
            $user = $this->getDoctrine()->getRepository("AppBundle:Client")
                    ->recupClient($dto->getLogin(), $dto->getMotDePasse());

            if ($user == NULL)
            {
                // ici on n'a pas retrouvé l'utilisateur
                $message = "Login / mot de passe invalide.";
            } 
            else
            {
                // ici on a trouvé l'utilisateur
                // puis mettre l'id et le login de l'utilisateur en session
                $req->getSession()->set("client", $user);
                // affiche la liste des recettes 
                return  $this->redirectToRoute('listeDernieresCommandes');
            }
        }

        // ici le formulaire n'a pas été posté ou est invalide, ou utilisateur non trouvé
        return $this->render('AppBundle:InscriptionClient:connexion_client.html.twig', array(
            "monForm" => $form->createView(), "message" => $message
        ));
    }

    /**
     * @Route("/deconnexionClient", name="deconnexionClient")
     */
    public function deconnexionClientAction()
    {
        // pas de formulaire
        // on vide juste les sessions
        $req->getSession()->clear();
        // page de redirection 
        return  $this->redirectToRoute('accueil');
        
    }

}
