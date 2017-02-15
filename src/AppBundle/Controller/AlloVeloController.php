<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AlloVeloController extends Controller
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueilAction()
    {
        return $this->render('AppBundle:AlloVelo:accueil.html.twig', array(
            // ...
        ));
    }

}
