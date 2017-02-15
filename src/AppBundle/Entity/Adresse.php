<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\Embeddable;
use Doctrine\ORM\Mapping\Column;

/**
 * Description of Adresse
 *
 * @author Warsama
 * @Embeddable
 */
class Adresse {

    /** @Column(type = "string") */
    private $rue1;

    /** @Column(type = "string") */
    private $rue2;

    /** @Column(type = "string") */
    private $codePostal;

    /** @Column(type = "string") */
    private $ville;

}
