<?php

namespace App\Entity;

use App\Repository\SessionCoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionCoursRepository::class)]
class SessionCours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $hdebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $hfin = null;

    #[ORM\Column]
    private ?bool $isenligne = null;

   
    #[ORM\Column]
    private ?bool $isdemanderannuler = null;

    #[ORM\Column]
    private ?bool $isvalider = null;

    #[ORM\Column]
    private ?bool $isannuler = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getHdebut(): ?\DateTimeInterface
    {
        return $this->hdebut;
    }

    public function setHdebut(\DateTimeInterface $hdebut): static
    {
        $this->hdebut = $hdebut;

        return $this;
    }

    public function getHfin(): ?\DateTimeInterface
    {
        return $this->hfin;
    }

    public function setHfin(\DateTimeInterface $hfin): static
    {
        $this->hfin = $hfin;

        return $this;
    }

    public function isIsenligne(): ?bool
    {
        return $this->isenligne;
    }

    public function setIsenligne(bool $isenligne): static
    {
        $this->isenligne = $isenligne;

        return $this;
    }

   
    public function isIsdemanderannuler(): ?bool
    {
        return $this->isdemanderannuler;
    }

    public function setIsdemanderannuler(bool $isdemanderannuler): static
    {
        $this->isdemanderannuler = $isdemanderannuler;

        return $this;
    }

    public function isIsvalider(): ?bool
    {
        return $this->isvalider;
    }

    public function setIsvalider(bool $isvalider): static
    {
        $this->isvalider = $isvalider;

        return $this;
    }

    public function isIsannuler(): ?bool
    {
        return $this->isannuler;
    }

    public function setIsannuler(bool $isannuler): static
    {
        $this->isannuler = $isannuler;

        return $this;
    }
}
