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

    public function creerCommande($adresseReception, $adresseLivraison, $fraisLivraison, $user)
    {
        // récupérer un client en tant qu'entité
        $user = $this->em->find("AppBundle:Client", $user->getId());
        
        // créer une commande
        $cmde = new \AppBundle\Entity\Commande();
        $cmde->setAdresseLivraison($adresseLivraison);
        $cmde->setAdresseReception($adresseReception);
        $cmde->setFraisLivraison($fraisLivraison);
        $cmde->setClient($user);
        $cmde->setEtat("PAYEE");
        $cmde->setDateCommande(new \DateTime());
        // faire l'inscription de la commande en bdd (persist)
        $this->em->persist($cmde);
        $this->em->flush();
    }
    
    // attribue une commande à un livreur 
    public function commandeAttribuee($cmd, $livreur)
    {
        // récupérer le livreur en tant qu'entité
        $livreur = $this->em->find("AppBundle:Livreur", $livreur->getId());
        
        // modifier la commande
        $commande = $this->em->find("AppBundle:Commande", $cmd->getId());
//        $commande = new \AppBundle\Entity\Commande();
        $commande->setLivreur($livreur);
        $commande->setEtat("ATTRIBUEE");
        // faire les modifs de la commande en bdd (persist)
        $this->em->persist($commande);
        $this->em->flush();
    }
    
     //  commande réceptionnée par le livreur 
    public function commandeReceptionnee($cmd)
    {
        // modifier la commande
        $commande = $this->em->find("AppBundle:Commande", $cmd->getId());
//        $commande = new \AppBundle\Entity\Commande();
        $commande->setEtat("RECEPTIONNEE");
        $commande->setDateReception(new \DateTime());
        // faire les modifs de la commande en bdd (persist)
        $this->em->persist($commande);
        $this->em->flush();
    }
    
     //  le client indique que la commande est terminée 
    public function commandeLivree($idCmd)
    {
        // modifier la commande
        $commande = $this->em->find("AppBundle:Commande", $idCmd);
//        $commande = new \AppBundle\Entity\Commande();
        $commande->setEtat("LIVREE");
        $commande->setDateLivraison(new \DateTime());
        // faire les modifs de la commande en bdd (persist)
        $this->em->persist($commande);
        $this->em->flush();
    }

}
