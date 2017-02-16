<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CoteClientControleur extends Controller
{
    /**
     * @Route("/creerCommande", name="creerCommande")
     */
    public function creerCommandeAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        // créer un DTO
        $dto = new \AppBundle\DTO\CommandeDTO();
        $form = $this->createForm(\AppBundle\Form\CommandeClientType::class, $dto); // crée le formulaire
        $form->handleRequest($request); // applique le form binding
        
        if ($form->isSubmitted() && $form->isValid())
        {
            // le formulaire est valide
            // calculer le prix en fonction des 2 adresses
            // appeler la fonction de Warsama
            
            // mettre tout ça en base
        }
        // afficher le form !!!
        return $this->render('AppBundle:CoteClientControleur:creer_commande.html.twig', array(
            // ...
        ));
    }
    
    public function listerCommandeAction() {
        
        
        
    }

}
