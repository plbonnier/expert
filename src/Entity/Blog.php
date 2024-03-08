<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $article = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienVideo = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\OneToMany(mappedBy: 'blog', targetEntity: PhotoBlog::class, cascade: ['persist', 'remove'])]
    private Collection $photoBlogs;

    public function __construct()
    {
        $this->photoBlogs = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->titre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): static
    {
        $this->article = $article;

        return $this;
    }

    public function getLienVideo(): ?string
    {
        return $this->lienVideo;
    }

    public function setLienVideo(?string $lienVideo): static
    {
        $this->lienVideo = $lienVideo;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

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

    /**
     * @return Collection<int, PhotoBlog>
     */
    public function getPhotoBlogs(): Collection
    {
        return $this->photoBlogs;
    }

    public function addPhotoBlog(PhotoBlog $photoBlog): static
    {
        if (!$this->photoBlogs->contains($photoBlog)) {
            $this->photoBlogs->add($photoBlog);
            $photoBlog->setBlog($this);
        }

        return $this;
    }

    public function removePhotoBlog(PhotoBlog $photoBlog): static
    {
        if ($this->photoBlogs->removeElement($photoBlog)) {
            // set the owning side to null (unless already changed)
            if ($photoBlog->getBlog() === $this) {
                $photoBlog->setBlog(null);
            }
        }

        return $this;
    }
}
