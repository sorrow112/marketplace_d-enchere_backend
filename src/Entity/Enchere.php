<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EnchereRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EnchereRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:enchere:collection']],
    denormalizationContext: ['groups' => ['write:enchere']],
    paginationItemsPerPage:12 ,
    itemOperations: [
        'put',
        'delete',
        'get' => [
            'normalisation_context' => ['groups' => ['read:enchere:collection', 'read:enchere:item']]
        ]
    ]
        ),ApiFilter(
    SearchFilter::class ,
    properties: ['category' => 'exact', 'user' => 'exact', 'name'=>'partial','id' => 'exact']
)]
class Enchere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:surveille:collection', 'read:fermeture:collection','read:enchere:collection'])]
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Groups(['read:enchere:collection', "read:enchere:item", 'write:enchere'])]
    #[Assert\Positive]
    private $quantity;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:enchere:item',"read:enchere:item", 'write:enchere'])]
    #[Assert\Positive]
    private $init_price;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:enchere:collection',"read:enchere:item", 'write:enchere'])]
    #[Assert\Positive]
    private $immediate_price;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:enchere:collection', 'read:surveille:collection',"read:enchere:item", 'write:enchere'])]
    #[Assert\Positive]
    private $current_price;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['read:enchere:collection',"read:enchere:item", 'write:enchere'])]
    #[Assert\GreaterThan('today')]
    private $start_date;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['read:enchere:collection',"read:enchere:item", 'write:enchere'])]
    #[Assert\GreaterThan('today')]
    private $end_date;

    #[ORM\OneToMany(mappedBy: 'enchere', targetEntity: Surveille::class)]
    private $surveilles;

    #[ORM\OneToOne(inversedBy: 'enchere', targetEntity: Fermeture::class, cascade: ['persist', 'remove'])]
    private $fermeture;

    #[ORM\OneToMany(mappedBy: 'enchere', targetEntity: Augmentation::class, orphanRemoval: true)]
    #[Groups('read:enchere:item')]
    private $augmentations;

    #[ORM\OneToOne(targetEntity: Article::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:enchere:collection', 'read:surveille:collection', "read:enchere:item",'read:fermeture:collection'])]
    private $article;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("read:enchere:item",'read:enchere:collection', 'write:enchere')]
    private $user;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'encheres')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:enchere:item','read:enchere:collection','write:enchere'])]
    private $category;

 


    public function __construct()
    {
        $this->surveilles = new ArrayCollection();
        $this->augmentations = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
   
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getInitPrice(): ?float
    {
        return $this->init_price;
    }

    public function setInitPrice(float $init_price): self
    {
        $this->init_price = $init_price;

        return $this;
    }

    public function getImmediatePrice(): ?float
    {
        return $this->immediate_price;
    }

    public function setImmediatePrice(float $immediate_price): self
    {
        $this->immediate_price = $immediate_price;

        return $this;
    }

    public function getCurrentPrice(): ?float
    {
        return $this->current_price;
    }

    public function setCurrentPrice(float $current_price): self
    {
        $this->current_price = $current_price;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * @return Collection|Surveille[]
     */
    public function getSurveilles(): Collection
    {
        return $this->surveilles;
    }

    public function addSurveille(Surveille $surveille): self
    {
        if (!$this->surveilles->contains($surveille)) {
            $this->surveilles[] = $surveille;
            $surveille->setEnchere($this);
        }

        return $this;
    }

    public function removeSurveille(Surveille $surveille): self
    {
        if ($this->surveilles->removeElement($surveille)) {
            // set the owning side to null (unless already changed)
            if ($surveille->getEnchere() === $this) {
                $surveille->setEnchere(null);
            }
        }

        return $this;
    }

    public function getFermeture(): ?Fermeture
    {
        return $this->fermeture;
    }

    public function setFermeture(?Fermeture $fermeture): self
    {
        $this->fermeture = $fermeture;

        return $this;
    }

    /**
     * @return Collection|Augmentation[]
     */
    public function getAugmentations(): Collection
    {
        return $this->augmentations;
    }

    public function addAugmentation(Augmentation $augmentation): self
    {
        if (!$this->augmentations->contains($augmentation)) {
            $this->augmentations[] = $augmentation;
            $augmentation->setEnchere($this);
        }

        return $this;
    }

    public function removeAugmentation(Augmentation $augmentation): self
    {
        if ($this->augmentations->removeElement($augmentation)) {
            // set the owning side to null (unless already changed)
            if ($augmentation->getEnchere() === $this) {
                $augmentation->setEnchere(null);
            }
        }

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
