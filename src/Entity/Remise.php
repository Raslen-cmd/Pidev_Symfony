<?php

namespace App\Entity;

use App\Repository\RemiseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RemiseRepository::class)
 */
class Remise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message=" libelle doit etre non vide")
     * @Assert\Length(
     *      min=3,
     * max=20,
     * minMessage="Entrer une libelle au minimum 3 caractères")
     * maxMessage="Entrer une libelle au maximum 20 caractères")
    
     *
     *     
     * @ORM\Column(type="string", length=20)
     */
    private $libelle;

     /**
     * @Assert\NotBlank(message=" pourcentage doit etre non vide")
     * @Assert\Length(
     *      max =2 ,
     *      maxMessage=" Entrer le pourcentage au maximum de 2 caractères"
     *
     *     )
     * @ORM\Column(type="integer")
     */
    private $pourcentage;

     /**
     * @Assert\NotBlank(message=" Ancien prix doit etre non vide")
     * @Assert\Length(
     *      min = 1,
     *      minMessage=" Entrer l'ancien prix"
     *
     *     )
     * @ORM\Column(type="float")
     */
    private $ancienPrix;

    /**
     * @Assert\NotBlank(message=" Nouveau prix doit etre non vide")
     * @Assert\Length(
     *      min = 1,
     *      minMessage=" Entrer l'ancien prix"
     *
     *     )
     * @ORM\Column(type="float")
     */
    private $nouveauPrix;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="id_remise")
     */
    private $id_commande;

    public function __construct()
    {
        $this->id_commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPourcentage(): ?int
    {
        return $this->pourcentage;
    }

    public function setPourcentage(int $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getAncienPrix(): ?float
    {
        return $this->ancienPrix;
    }

    public function setAncienPrix(float $ancienPrix): self
    {
        $this->ancienPrix = $ancienPrix;

        return $this;
    }

    public function getNouveauPrix(): ?float
    {
        return $this->nouveauPrix;
    }

    public function setNouveauPrix(float $nouveauPrix): self
    {
        $this->nouveauPrix = $nouveauPrix;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getIdCommande(): Collection
    {
        return $this->id_commande;
    }

    public function addIdCommande(Commande $idCommande): self
    {
        if (!$this->id_commande->contains($idCommande)) {
            $this->id_commande[] = $idCommande;
            $idCommande->setIdRemise($this);
        }

        return $this;
    }

    public function removeIdCommande(Commande $idCommande): self
    {
        if ($this->id_commande->removeElement($idCommande)) {
            // set the owning side to null (unless already changed)
            if ($idCommande->getIdRemise() === $this) {
                $idCommande->setIdRemise(null);
            }
        }

        return $this;
    }
}
