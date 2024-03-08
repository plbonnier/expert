<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LotRepository::class)]
class Lot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $lotNumero = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $estimationBasse = null;

    #[ORM\Column]
    private ?int $estimationHaute = null;

    #[ORM\Column(nullable: true)]
    private ?bool $vendu = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $taille = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $poids = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $materiaux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pierre = null;

    #[ORM\Column(nullable: true)]
    private ?bool $certificat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    private ?Vente $vente = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixVendu = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoCertificat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        $this->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nom), '-'));

        return $this;
    }
    public function generateSlug(): void
    {
        // Vérifie si le nomVente n'est pas null
        if ($this->nom) {
            $this->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->nom), '-'));
        }
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getLotNumero(): ?int
    {
        return $this->lotNumero;
    }

    public function setLotNumero(int $lotNumero): static
    {
        $this->lotNumero = $lotNumero;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEstimationBasse(): ?int
    {
        return $this->estimationBasse;
    }

    public function setEstimationBasse(int $estimationBasse): static
    {
        $this->estimationBasse = $estimationBasse;

        return $this;
    }

    public function getEstimationHaute(): ?int
    {
        return $this->estimationHaute;
    }

    public function setEstimationHaute(int $estimationHaute): static
    {
        $this->estimationHaute = $estimationHaute;

        return $this;
    }

    public function isVendu(): ?bool
    {
        return $this->vendu;
    }

    public function setVendu(?bool $vendu): static
    {
        $this->vendu = $vendu;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(string $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getMateriaux(): ?string
    {
        return $this->materiaux;
    }

    public function setMateriaux(string $materiaux): static
    {
        $this->materiaux = $materiaux;

        return $this;
    }

    public function getPierre(): ?string
    {
        return $this->pierre;
    }

    public function setPierre(?string $pierre): static
    {
        $this->pierre = $pierre;

        return $this;
    }

    public function isCertificat(): ?bool
    {
        return $this->certificat;
    }

    public function setCertificat(?bool $certificat): static
    {
        $this->certificat = $certificat;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getVente(): ?Vente
    {
        return $this->vente;
    }

    public function setVente(?Vente $vente): static
    {
        $this->vente = $vente;

        return $this;
    }

    public function getPrixVendu(): ?int
    {
        return $this->prixVendu;
    }

    public function setPrixVendu(?int $prixVendu): static
    {
        $this->prixVendu = $prixVendu;

        return $this;
    }

    public function getPhotoCertificat(): ?string
    {
        return $this->photoCertificat;
    }

    public function setPhotoCertificat(?string $photoCertificat): static
    {
        $this->photoCertificat = $photoCertificat;
        return $this;
    }
}
