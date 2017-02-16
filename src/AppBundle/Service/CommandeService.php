<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 * Description of CommandeService
 *
 * @author Hélène 
 */
class CommandeService
{
    /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    

    function __construct(\Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function creerCommande($adresseReception, $adresseLivraison, $fraisLivraison)
    {
        // récupérer un client depuis la session
        $client = $request->getSession()->get("user");
            $user = $em->find("AppBundle:Utilisateur", $user->getId());
        
        // créer une commande
        $cmde = new \AppBundle\Entity\Commande();
        $cmde->setAdresseLivraison($adresseLivraison);
        $cmde->setAdresseReception($adresseReception);
        $cmde->setClient($client);
        $cmde->setEtat("PAYEE");
        $cmde->setDateCommande(new \date());
        // faire l'inscription de la commande en bdd (persist)
        $this->em->persist($cmde);
        $this->em->flush();
    }

}
