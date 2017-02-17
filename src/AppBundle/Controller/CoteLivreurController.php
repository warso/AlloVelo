<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route ("/livreur")
 */
class CoteLivreurController extends Controller {

    /**
     * @Route("/listeCommande", name = "listeCommande")
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

    /**
     * @Route ("/listerLivraisonFini", name = "listerLivraisonFini")
     */
    public function listerLivraisonFini() {

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
//        $qb = new \Doctrine\ORM\QueryBuilder;
        $qb->select("c")
                ->from("AppBundle:Commande", "c")
                ->where("c.client = :client")
                ->andWhere("c.etat = 'LIVREE'")
                ->setParameter("client", $this->getUser());


        $query = $qb->getQuery();

        $commande = $query->getResult();
        //affiche le formulaire

        return $this->render('AppBundle:CoteLivreur:listerLivraisonFini.html.twig', array("commandesLiv" => $commande));
    }

    public function indiquerProduitRecepAction($idCommande) {

        $this->get("commande_service")->commandeReceptionnee($idCommande);

        return $this->redirectToRoute('listerCommande');
    }
    
    

}
