<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Callback;

/**
 * Description of CommandeDTO
 *
 * @author Hélène 
 */
class CommandeDTO
{
    /**
     *
     * @NotBlank(message="L'adresse de Réception ne peut être vide.")
     */
    private $adresseReception;
    
    /**
     *
     * @NotBlank(message="L'adresse de livraison ne peut être vide.")
     */
    private $adresseLivraison;
    
    /**
     * 
     * 
     */
    private $distance;
    
    private $fraisLivraison;
    
    function getAdresseReception()
    {
        return $this->adresseReception;
    }

    function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }

    function getDistance()
    {
        return $this->distance;
    }

    function getFraisLivraison()
    {
        return $this->fraisLivraison;
    }

    function setAdresseReception($adresseReception)
    {
        $this->adresseReception = $adresseReception;
    }

    function setAdresseLivraison($adresseLivraison)
    {
        $this->adresseLivraison = $adresseLivraison;
    }

    function setDistance($distance)
    {
        $this->distance = $distance;
    }

    function setFraisLivraison($fraisLivraison)
    {
        $this->fraisLivraison = $fraisLivraison;
    }

        
    /**
     * @Callback
     */
    function callbackCommande(\Symfony\Component\Validator\Context\ExecutionContextInterface $context, $payload)
    {
        if ($this->distance == NULL || $this->fraisLivraison==NULL)
        {
            $context->buildViolation("Veuillez calculer les frais de livraison et la distance avant de valider.")->addViolation();
        }
    }


}
