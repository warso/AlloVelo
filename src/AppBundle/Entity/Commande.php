<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\JoinColumn(name="livreur_id")
     * @ORM\ManyToOne(targetEntity="Livreur", inversedBy="commandes")
     */
    private $livreur;

    /**
     * @ORM\JoinColumn(name="client_id")
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="commandes")
     */
    private $client;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCommande", type="datetime")
     */
    private $dateCommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReception", type="datetime")
     */
    private $dateReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraison", type="datetime", nullable=true)
     */
    private $dateLivraison;

    /**
     * @var float
     *
     * @ORM\Column(name="fraisLivraison", type="float", nullable=true)
     */
    private $fraisLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var string
     * 
     * @ORM\Column(name="adresseReception", type="text", nullable=true )       
     */
    private $adresseReception;

    /**
     * @var string
     * 
     * @ORM\Column(name="adresseLivraison", type="text", nullable=true )       
     */
    private $adresseLivraison;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dateCommande
     *
     * @param \DateTime $dateCommande
     *
     * @return Commande
     */
    public function setDateCommande($dateCommande) {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get dateCommande
     *
     * @return \DateTime
     */
    public function getDateCommande() {
        return $this->dateCommande;
    }

    /**
     * Set dateReception
     *
     * @param \DateTime $dateReception
     *
     * @return Commande
     */
    public function setDateReception($dateReception) {
        $this->dateReception = $dateReception;

        return $this;
    }

    /**
     * Get dateReception
     *
     * @return \DateTime
     */
    public function getDateReception() {
        return $this->dateReception;
    }

    /**
     * Set dateLivraison
     *
     * @param \DateTime $dateLivraison
     *
     * @return Commande
     */
    public function setDateLivraison($dateLivraison) {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get dateLivraison
     *
     * @return \DateTime
     */
    public function getDateLivraison() {
        return $this->dateLivraison;
    }

    /**
     * Set fraisLivraison
     *
     * @param float $fraisLivraison
     *
     * @return Commande
     */
    public function setFraisLivraison($fraisLivraison) {
        $this->fraisLivraison = $fraisLivraison;

        return $this;
    }

    /**
     * Get fraisLivraison
     *
     * @return float
     */
    public function getFraisLivraison() {
        return $this->fraisLivraison;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Commande
     */
    public function setEtat($etat) {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat() {
        return $this->etat;
    }

    /**
     * Set adresseReception
     *
     * @param \AppBundle\Entity\Adresse $adresseReception
     *
     * @return Commande
     */
    public function setAdresseReception(\AppBundle\Entity\Adresse $adresseReception) {
        $this->adresseReception = $adresseReception;

        return $this;
    }

    /**
     * Get adresseReception
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresseReception() {
        return $this->adresseReception;
    }

    /**
     * Set adresseLivraison
     *
     * @param \AppBundle\Entity\Adresse $adresseLivraison
     *
     * @return Commande
     */
    public function setAdresseLivraison(\AppBundle\Entity\Adresse $adresseLivraison) {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    /**
     * Get adresseLivraison
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresseLivraison() {
        return $this->adresseLivraison;
    }

    /**
     * Set livreur
     *
     * @param \AppBundle\Entity\Livreur $livreur
     *
     * @return Commande
     */
    public function setLivreur(\AppBundle\Entity\Livreur $livreur = null) {
        $this->livreur = $livreur;

        return $this;
    }

    /**
     * Get livreur
     *
     * @return \AppBundle\Entity\Livreur
     */
    public function getLivreur() {
        return $this->livreur;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Commande
     */
    public function setClient(\AppBundle\Entity\Client $client = null) {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient() {
        return $this->client;
    }

    public function __toString() {
        return "Commande: " . $this->id;
    }

}
