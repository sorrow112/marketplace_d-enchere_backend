<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:category:collection']],
    denormalizationContext: ['groups' => ['write:category']],
    itemOperations: [
        'delete',
        'put',
        'get' => [
            'normalisation_context' => ['groups' => ['read:category:collection', 'read:category:item']]
        ]
    ]
)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:category:collection', 'write:category'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:category:collection', 'write:category'])]
    private $name;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'categorie')]
    #[Groups(['read:category:item'])]
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->addCategorie($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            $article->removeCategorie($this);
        }

        return $this;
    }
}
