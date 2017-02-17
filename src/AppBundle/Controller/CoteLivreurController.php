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
                ->where("c.livreur = :livreur")
                ->andWhere("c.etat = 'LIVREE'")
                ->setParameter("livreur", $this->getUser());


        $query = $qb->getQuery();

        $commande = $query->getResult();
        //affiche le formulaire

        return $this->render('AppBundle:CoteLivreur:listerLivraisonFini.html.twig', array("commandesLiv" => $commande));
    }

    /**
     * @Route ("/listeCommandeChoisie", name = "listeCommandeChoisie")
     */
    public function listeCommandeChoisie() {

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
//        $qb = new \Doctrine\ORM\QueryBuilder;
        $qb->select("c")
                ->from("AppBundle:Commande", "c")
                ->where("c.livreur = :livreur")
                ->andWhere("c.etat IN ('ATTRIBUEE')")
                ->orderBy("c.etat","DESC")
                ->setParameter("livreur", $this->getUser());
        $query = $qb->getQuery();

        $commande = $query->getResult();
        //affiche le formulaire

        return $this->render('AppBundle:CoteLivreur:listerCommandeChoisi.html.twig', array("commandesCh" => $commande));
        
    }
    
    /**
     * @Route ("/listeCommandeReceptionnee", name = "listeCommandeReceptionnee")
     */
    public function listeCommandeReceptionnee() {

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
//        $qb = new \Doctrine\ORM\QueryBuilder;
        $qb->select("c")
                ->from("AppBundle:Commande", "c")
                ->where("c.livreur = :livreur")
                ->andWhere("c.etat IN ('RECEPTIONNEE')")
                ->orderBy("c.etat","DESC")
                ->setParameter("livreur", $this->getUser());
        $query = $qb->getQuery();

        $commande = $query->getResult();
        //affiche le formulaire

        return $this->render('AppBundle:CoteLivreur:listerCommandeReceptionnee.html.twig', array("commandesRec" => $commande));
        
    }


    /**
     * Livreur choisi sa commande à livrer
     * @Route("/choisirCommande/{idCommande}", name="choisirCommande")
     */
    public function choisirCommandeAction($idCommande) {

        $this->get("commande_service")->commandeAttribuee($idCommande, $this->getUser());
        return $this->redirectToRoute('listeCommandeChoisie');
    }
    
        /**
     * Livreur receptionne sa commande à livrer
     * @Route("/receptionnerCommande/{idCommande}", name="receptionnerCommande")
     */
    public function receptionnerCommandeAction($idCommande) {

        $this->get("commande_service")->commandeReceptionnee($idCommande, $this->getUser());
        return $this->redirectToRoute('listeCommandeReceptionnee');
    }

}
