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

    /** @Column(name="rue1", type="string", length=255, nullable=true) */
    private $rue1;

    /** @Column(name="rue2", type="string", length=255, nullable=true) */
    private $rue2;

    /** @Column(name="codePostal", type="string", length=255, nullable=true) */
    private $codePostal;

    /** @Column(name="ville", type="string", length=255, nullable=true) */
    private $ville;

}
