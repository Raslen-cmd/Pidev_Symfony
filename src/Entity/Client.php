<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $RespComm;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $string;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $respfinan;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adrLiv;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $addFacture;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $portable;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     */
    private $soldeInit;

    /**
     * @ORM\Column(type="float")
     */
    private $solde;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getRespComm(): ?string
    {
        return $this->RespComm;
    }

    public function setRespComm(string $RespComm): self
    {
        $this->RespComm = $RespComm;

        return $this;
    }

    public function getString(): ?string
    {
        return $this->string;
    }

    public function setString(string $string): self
    {
        $this->string = $string;

        return $this;
    }

    public function getRespfinan(): ?string
    {
        return $this->respfinan;
    }

    public function setRespfinan(string $respfinan): self
    {
        $this->respfinan = $respfinan;

        return $this;
    }

    public function getAdrLiv(): ?string
    {
        return $this->adrLiv;
    }

    public function setAdrLiv(string $adrLiv): self
    {
        $this->adrLiv = $adrLiv;

        return $this;
    }

    public function getAddFacture(): ?string
    {
        return $this->addFacture;
    }

    public function setAddFacture(string $addFacture): self
    {
        $this->addFacture = $addFacture;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSoldeInit(): ?float
    {
        return $this->soldeInit;
    }

    public function setSoldeInit(float $soldeInit): self
    {
        $this->soldeInit = $soldeInit;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }


}
