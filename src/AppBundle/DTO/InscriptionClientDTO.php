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
 * Description of InscriptionClientDTO
 *
 * @author Hélène 
 */
class InscriptionClientDTO
{

    /**
     *
     * @NotBlank(message="Le nom ne peut être vide.")
     */
    private $nom;
    private $prenom;

    /**
     *
     * @NotBlank(message="Le login ne peut être vide.")
     */
    private $login;

    /**
     *
     * @NotBlank(message="Le mot de passe ne peut être vide.")
     */
    private $motDePasse1;

    /**
     *
     * @NotBlank(message="Le mot de passe ne peut être vide.")
     */
    private $motDePasse2;
    private $telephone;
    private $mail;

    function getNom()
    {
        return $this->nom;
    }

    function getPrenom()
    {
        return $this->prenom;
    }

    function getLogin()
    {
        return $this->login;
    }

    function getMotDePasse1()
    {
        return $this->motDePasse1;
    }

    function getMotDePasse2()
    {
        return $this->motDePasse2;
    }

    function getTelephone()
    {
        return $this->telephone;
    }

    function getMail()
    {
        return $this->mail;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }

    function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    function setLogin($login)
    {
        $this->login = $login;
    }

    function setMotDePasse1($motDePasse1)
    {
        $this->motDePasse1 = $motDePasse1;
    }

    function setMotDePasse2($motDePasse2)
    {
        $this->motDePasse2 = $motDePasse2;
    }

    function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @Callback
     */
    function callbackInscriptionClient(\Symfony\Component\Validator\Context\ExecutionContextInterface $context, $payload)
    {
        if ($this->motDePasse1 != $this->motDePasse2)
        {
            $context->buildViolation("Les 2 mots de passe doivent être identiques.")->addViolation();
        }
    }

}
