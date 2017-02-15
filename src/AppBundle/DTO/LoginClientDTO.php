<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Description of LoginClientDTO
 *
 * @author Hélène 
 */
class LoginClientDTO
{
    /**
     *
     * @NotBlank(message="Le login ne peut être vide.")
     */
    private $login;
    /**
     *
     * @NotBlank(message="Le mot de passe ne peut être vide.")
     */
    private $motDePasse;
    
    function getLogin()
    {
        return $this->login;
    }

    function getMotDePasse()
    {
        return $this->motDePasse;
    }

    function setLogin($login)
    {
        $this->login = $login;
    }

    function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }


}
