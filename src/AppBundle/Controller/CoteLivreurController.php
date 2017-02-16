<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route ("/livreur")
 */
class CoteLivreurController extends Controller
{
    /**
     * @Route("/listeProduit")
     */
    public function ListeProduitAction()
    {
      $qb->select("c")
                ->from("AppBundle:Commande", "c")
                ->orderBy("c.id");
      
        return $this->render('AppBundle:CoteLivreur:liste_produit.html.twig', array("mesCommandes"=> $commandes ));
            // ...
      
    }

}
 
