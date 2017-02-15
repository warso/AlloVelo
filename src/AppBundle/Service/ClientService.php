<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 * Description of ClientService
 *
 * @author Hélène 
 */
class ClientService 
{

    /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    

    function __construct(\Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function inscrire(\AppBundle\Entity\Client $client)
    {
        // faire l'inscription du client en bdd (persist)
        $this->em->persist($client);
        $this->em->flush();
    }

}
