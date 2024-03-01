<?php

namespace App\Entity;

use App\Repository\PhotoUserRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: PhotoUserRepository::class)]
#[Vich\Uploadable]
class PhotoUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'photousers_image', fileNameProperty: 'photo')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'photoUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?DateTimeImmutable $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
    }


    public function __toString(): string
    {

        return $this->description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
