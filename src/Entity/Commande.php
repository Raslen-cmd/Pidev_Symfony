<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message=" tht doit etre non vide")
     * @Assert\Length(
     *       max = 30,
     *      maxMessage=" Entrer le numero commande au mini de 30 caracteres"
     *
     *     )
     * @ORM\Column(type="integer")
     */
    private $numcom;

    /**
     * @Assert\NotBlank(message=" date commande doit etre non vide")
     
     * @ORM\Column(type="date")
     */
    private $dateComm;


    /**
     * @Assert\NotBlank(message="observation doit etre non vide")
     * @Assert\Length(
     * min=10,
     * max=100,
     * minMessage="Entrer une observation au minimum 10 caractères")
     * maxMessage="Entrer une observation au maximum 100 caractères")
    
     * @ORM\Column(type="string", length=100)
     */
    private $observation;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_client;

    
     /**
     * @Assert\NotBlank(message=" tht doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer le tht au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="float")
     */
    private $tht;

  

    /**
     * @Assert\NotBlank(message=" ttva doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer le ttva au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="float")
     */
    private $ttva;

    /**
     * @Assert\NotBlank(message=" ttc doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer le ttc au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="float")
     */
    private $tttc;

    /**
     * @ORM\ManyToOne(targetEntity=Remise::class, inversedBy="id_commande")
     */
    private $id_remise;

    

  

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumcom(): ?int
    {
        return $this->numcom;
    }

    public function setNumcom(int $numcom): self
    {
        $this->numcom = $numcom;

        return $this;
    }

    public function getDateComm(): ?\DateTimeInterface
    {
        return $this->dateComm;
    }

    public function setDateComm(\DateTimeInterface $dateComm): self
    {
        $this->dateComm = $dateComm;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->id_client;
    }

    public function setIdClient(?Client $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getTht(): ?float
    {
        return $this->tht;
    }

    public function setTht(float $tht): self
    {
        $this->tht = $tht;

        return $this;
    }

   

    

    public function getTtva(): ?float
    {
        return $this->ttva;
    }

    public function setTtva(float $ttva): self
    {
        $this->ttva = $ttva;

        return $this;
    }

    public function getTttc(): ?float
    {
        return $this->tttc;
    }

    public function setTttc(float $tttc): self
    {
        $this->tttc = $tttc;

        return $this;
    }

    public function getIdRemise(): ?Remise
    {
        return $this->id_remise;
    }

    public function setIdRemise(?Remise $id_remise): self
    {
        $this->id_remise = $id_remise;

        return $this;
    }

    
}
