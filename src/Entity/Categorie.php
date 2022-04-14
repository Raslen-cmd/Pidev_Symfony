<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    
     // @ORM\OneToMany(targetEntity="App\Entity\Categorie",
     // mappedBy="Produit")
     
    private $idCat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cat", type="string", length=30, nullable=false)
     */
    private $nomCat;

    public function getIdCat(): ?int
    {
        return $this->idCat;
    }

    public function getNomCat(): ?string
    {
        return $this->nomCat;
    }

    public function setNomCat(string $nomCat): self
    {
        $this->nomCat = $nomCat;

        return $this;
    }


}