<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ConnectionController extends Controller
{
    /**
     * @Route("/connection", name = "connection")
     */

    public function connexionAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\ConnectionDTO(); // crée un DTO de type Login
        $form = $this->createForm(\AppBundle\Form\ConnectionType::class, $dto); // crée le formulaire
        $form->handleRequest($req); // applique le form binding
        $message = "";
        if ($form->isSubmitted() && $form->isValid())
        {
            // le formulaire est valide
            // il faut vérifier que le login / mot de passe existe bien dans la base
            
            $user = $this->getDoctrine()->getRepository("AppBundle:Livreur")
                    ->recupLivreur($dto->getLogin(), $dto->getMdp());

            if ($user == NULL)
            {
                // ici on n'a pas retrouvé l'utilisateur
                $message = "Login / mot de passe invalide.";
            } 
            else
            {
                // ici on a trouvé l'utilisateur
                // puis mettre l'id et le login de l'utilisateur en session
                $req->getSession()->set("livreur", $user);
                // affiche la liste des recettes 
                return  $this->redirectToRoute('listeCommandeDispo');
            }
        }

        // ici le formulaire n'a pas été posté ou est invalide, ou utilisateur non trouvé
        return $this->render('AppBundle:Connection:connection.html.twig', array(
            "monForm" => $form->createView(), "message" => $message
        ));
    }
     /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexionAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        // pas de formulaire
        // on vide juste les sessions
        $req->getSession()->clear();
        // page de redirection 
        return  $this->redirectToRoute('accueil');
        
    }

}
