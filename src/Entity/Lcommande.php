<?php

namespace App\Entity;

use App\Repository\LcommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LcommandeRepository::class)
 */
class Lcommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\Column(type="float")
     */
    private $pu;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_produit;

      /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPu(): ?float
    {
        return $this->pu;
    }

    public function setPu(float $pu): self
    {
        $this->pu = $pu;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->id_produit;
    }

    public function setIdProduit(?Produit $id_produit): self
    {
        $this->id_produit = $id_produit;

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->id_commande;
    }

    public function setIdCommande(?Commande $id_commande): self
    {
        $this->id_commande = $id_commande;

        return $this;
    }

}
