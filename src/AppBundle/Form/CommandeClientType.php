<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

/**
 * Description of CommandeClientType
 *
 * @author Hélène 
 */
class CommandeClientType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('adresseReception', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
                ->add('adresseLivraison', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
                ->add("submit", \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }

}
