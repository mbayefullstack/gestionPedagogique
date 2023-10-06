<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbresHeuresGlobals = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbresHeuresGlobals(): ?int
    {
        return $this->nbresHeuresGlobals;
    }

    public function setNbresHeuresGlobals(int $nbresHeuresGlobals): static
    {
        $this->nbresHeuresGlobals = $nbresHeuresGlobals;

        return $this;
    }
}
