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
     * @Route("/ListeProduit")
     */
    public function ListeProduitAction()
    {
      $qb->select("c")
                ->from("AppBundle:Commande", "c")
                ->orderBy("r.id");
        return $this->render('AppBundle:CoteLivreur:liste_produit.html.twig', array("mesCommandes"=> $commandes ));
            // ...
      
    }

}
 public function listeDerniereRecetteAction($page = 0) {

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
//        $qb = new \Doctrine\ORM\QueryBuilder;

        $qb->select("r")
                ->from("AppBundle:Recette", "r")
                ->orderBy("r.id");
//                ->setFirstResult(0)
//                ->setMaxResults(2);


        $query = $qb->getQuery();

        $recettes = $query->getResult();

        // Calcul nb de resultat
        $nbPages = (int) (sizeof($recettes)); //ou count()


    }

