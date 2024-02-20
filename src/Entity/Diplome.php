<?php

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiplomeRepository::class)]
class Diplome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomDiplome = null;

    #[ORM\Column(length: 50)]
    private ?string $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDiplome(): ?string
    {
        return $this->nomDiplome;
    }

    public function setNomDiplome(string $nomDiplome): static
    {
        $this->nomDiplome = $nomDiplome;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }
}
