<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EnchereInverseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EnchereInverseRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:enchereInverse:collection']],
    denormalizationContext: ['groups' => ['write:enchereInverse']],
    itemOperations: [
        'put',
        'delete',
        'get' => [
            'normalisation_context' => ['groups' => ['read:enchereInverse:collection', 'read:enchereInverse:item']]
        ]
    ]
)]
class EnchereInverse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:surveille:collection', 'read:fermeture:collection','read:enchereInverse:collection'])]
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Groups(['read:enchereInverse:collection','write:enchereInverse'])]
    private $quantity;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:enchereInverse:item','write:enchereInverse'])]
    private $init_price;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:enchereInverse:collection','write:enchereInverse'])]
    private $immediate_price;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:enchereInverse:collection','write:enchereInverse','read:surveille:collection'])]
    private $current_price;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['read:enchereInverse:collection', 'write:enchereInverse'])]
    private $start_date;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['read:enchereInverse:collection', 'write:enchereInverse'])]
    private $end_date;

    #[ORM\OneToOne(targetEntity: Article::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    // #[Groups(['read:enchereInverse:collection', 'read:surveille:collection', 'read:fermeture:collection'])]
    private $article;

    #[ORM\OneToMany(mappedBy: 'enchereInverse', targetEntity: Surveille::class)]
    private $surveilles;

    #[ORM\OneToMany(mappedBy: 'enchereInverse', targetEntity: Reduction::class, orphanRemoval: true)]
    private $reductions;

    #[ORM\OneToOne(inversedBy: 'enchereInverse', targetEntity: Fermeture::class, cascade: ['persist', 'remove'])]
    private $fermeture;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'ventes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('read:enchereInverse:collection')]
    private $user;


    public function __construct()
    {
        $this->surveilles = new ArrayCollection();
        $this->reductions = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
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

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
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

    public function getStartDate(): ?\DateTime
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTime $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTime $end_date): self
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
            $surveille->setEnchereInverse($this);
        }

        return $this;
    }

    public function removeSurveille(Surveille $surveille): self
    {
        if ($this->surveilles->removeElement($surveille)) {
            // set the owning side to null (unless already changed)
            if ($surveille->getEnchereInverse() === $this) {
                $surveille->setEnchereInverse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reduction[]
     */
    public function getReductions(): Collection
    {
        return $this->reductions;
    }

    public function addReduction(Reduction $reduction): self
    {
        if (!$this->reductions->contains($reduction)) {
            $this->reductions[] = $reduction;
            $reduction->setEnchereInverse($this);
        }

        return $this;
    }

    public function removeReduction(Reduction $reduction): self
    {
        if ($this->reductions->removeElement($reduction)) {
            // set the owning side to null (unless already changed)
            if ($reduction->getEnchereInverse() === $this) {
                $reduction->setEnchereInverse(null);
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
}
