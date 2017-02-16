<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route ("/livreur")
 */
class CoteLivreurController extends Controller {

    /**
     * @Route("/listeCommande")
     */
    public function listeCommandeAction() {
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        $qb->select("c")
                ->from("AppBundle:Commande", "c")
                ->where("c.livreur is NULL")
                ->orderBy("c.dateCommande");

        $query = $qb->getQuery();

        $commande = $query->getResult();
        //affiche le formulaire
        return $this->render('AppBundle:CoteLivreur:listerCommandeLivreur.html.twig', array("commandesLiv" => $commande));
        // ...
    }

}
