<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppBundle\DTO;


/**
 *
 * @author Formation
 */
class ConnectionDTO {
    
    private $login;
    
    private $mdp;
    
    
    function getLogin() {
        return $this->login;
    }

    function getMdp() {
        return $this->mdp;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }      //put your code here
}
