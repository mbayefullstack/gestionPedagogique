<?php

namespace App\Entity;

use App\Repository\EmmergementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmmergementRepository::class)]
class Emmergement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $isemmerger = null;

    #[ORM\Column]
    private ?bool $isvalider = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsemmerger(): ?bool
    {
        return $this->isemmerger;
    }

    public function setIsemmerger(bool $isemmerger): static
    {
        $this->isemmerger = $isemmerger;

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
}
