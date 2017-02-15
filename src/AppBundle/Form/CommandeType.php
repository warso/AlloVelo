<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateCommande')->add('dateReception')->add('dateLivraison')->add('fraisLivraison')->add('etat')->add('adresseReception.rue1')->add('adresseReception.rue2')->add('adresseReception.codePostal')->add('adresseReception.ville')->add('adresseLivraison.rue1')->add('adresseLivraison.rue2')->add('adresseLivraison.codePostal')->add('adresseLivraison.ville')->add('livreur')->add('client')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Commande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_commande';
    }


}
