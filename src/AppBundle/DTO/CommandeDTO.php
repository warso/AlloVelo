<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

use Symfony\Component\Validator\Constraints\NotBlank;

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
    
    function getAdresseReception()
    {
        return $this->adresseReception;
    }

    function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }

    function setAdresseReception($adresseReception)
    {
        $this->adresseReception = $adresseReception;
    }

    function setAdresseLivraison($adresseLivraison)
    {
        $this->adresseLivraison = $adresseLivraison;
    }


}
