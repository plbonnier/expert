<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VenteRepository::class)]
class Vente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $passe = null;

    #[ORM\Column(nullable: true)]
    private ?bool $futur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateVente = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commissairePriseur = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 10)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomVente = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateExposition = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heureExposition = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPasse(): ?bool
    {
        return $this->passe;
    }

    public function setPasse(?bool $passe): static
    {
        $this->passe = $passe;

        return $this;
    }

    public function isFutur(): ?bool
    {
        return $this->futur;
    }

    public function setFutur(?bool $futur): static
    {
        $this->futur = $futur;

        return $this;
    }

    public function getDateVente(): ?\DateTimeInterface
    {
        return $this->dateVente;
    }

    public function setDateVente(\DateTimeInterface $dateVente): static
    {
        $this->dateVente = $dateVente;

        return $this;
    }

    public function getCommissairePriseur(): ?string
    {
        return $this->commissairePriseur;
    }

    public function setCommissairePriseur(?string $commissairePriseur): static
    {
        $this->commissairePriseur = $commissairePriseur;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNomVente(): ?string
    {
        return $this->nomVente;
    }

    public function setNomVente(?string $nomVente): static
    {
        $this->nomVente = $nomVente;

        return $this;
    }

    public function getDateExposition(): ?\DateTimeInterface
    {
        return $this->dateExposition;
    }

    public function setDateExposition(?\DateTimeInterface $dateExposition): static
    {
        $this->dateExposition = $dateExposition;

        return $this;
    }

    public function getHeureExposition(): ?string
    {
        return $this->heureExposition;
    }

    public function setHeureExposition(?string $heureExposition): static
    {
        $this->heureExposition = $heureExposition;

        return $this;
    }
}
