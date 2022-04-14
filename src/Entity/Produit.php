<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
    private $id_pdt;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_pdt;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $icone;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_cat;

    /**
     * @ORM\ManyToMany(targetEntity=Commande::class, mappedBy="id_produit")
     */
    private $qte;

    public function __construct()
    {
        $this->qte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPdt(): ?int
    {
        return $this->id_pdt;
    }

    public function setIdPdt(int $id_pdt): self
    {
        $this->id_pdt = $id_pdt;

        return $this;
    }

    public function getNomPdt(): ?string
    {
        return $this->nom_pdt;
    }

    public function setNomPdt(string $nom_pdt): self
    {
        $this->nom_pdt = $nom_pdt;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }

    public function getIdCat(): ?int
    {
        return $this->id_cat;
    }

    public function setIdCat(int $id_cat): self
    {
        $this->id_cat = $id_cat;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getQte(): Collection
    {
        return $this->qte;
    }

    public function addQte(Commande $qte): self
    {
        if (!$this->qte->contains($qte)) {
            $this->qte[] = $qte;
            $qte->addIdProduit($this);
        }

        return $this;
    }

    public function removeQte(Commande $qte): self
    {
        if ($this->qte->removeElement($qte)) {
            $qte->removeIdProduit($this);
        }

        return $this;
    }
}
