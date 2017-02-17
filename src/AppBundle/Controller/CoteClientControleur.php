<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/client")
 */
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
            // le prix et la distance sont récupéres dans le formulaire
            // appeler la fonction de Warsama
            // mettre tout ça en base

            $util = $this->getUser();
            $fraisLivraison = $dto->getFraisLivraison();
            $distance = $dto->getDistance();
            $this->get("commande_service")->creerCommande($dto->getAdresseReception(), $dto->getAdresseLivraison(), $fraisLivraison, $distance, $util);
        
             return  $this->redirectToRoute('listerCommande');
        }
        // afficher le form !!!
        return $this->render('AppBundle:CoteClientControleur:creer_commande.html.twig', array(
                        "monForm"=>$form->createView()
        ));
    }

    /**
     * Lister les commandes du client en cours
     * @Route("/listerCommande", name="listerCommande")
     */
    public function listerCommandeAction()
    {

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

//        $qb = new \Doctrine\ORM\QueryBuilder;

        $qb->select("c")
                ->from("AppBundle:Commande", "c")
                ->where("c.client = :client")
                ->orderBy("c.dateCommande")
                ->setParameter("client",$this->getUser());

        $query = $qb->getQuery();

        $commande = $query->getResult();

        // afficher le form !!!
        return $this->render('AppBundle:CoteClientControleur:listerCommandeClient.html.twig', array(
                    "commandesCli" => $commande
        ));
    }
    
    /**
     * Lister les commandes du client en cours
     * @Route("/terminerCommande/{idCommande}", name="terminerCommande")
     */
    public function terminerCommande($idCommande)
    {
        $this->get("commande_service")->commandeLivree($idCommande);
        
        return  $this->redirectToRoute('listerCommande');
    }

}
