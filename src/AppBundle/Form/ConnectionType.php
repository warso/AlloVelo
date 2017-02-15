<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;

class ConnectionType extends AbstractType {

    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) 
    {
        $builder->add("login", \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add("mdp", \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
                ->add("submit", \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }
}


