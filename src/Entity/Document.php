<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DocumentRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[ApiResource]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:vente:item', 'read:enchere:item', 'read:enchereInverse:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:vente:item', 'read:enchere:item', 'read:enchereInverse:item'])]
    private $path;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'documents')]
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
