<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReductionRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ReductionRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:reduction:collection']],
    denormalizationContext: ['groups' => ['write:reduction']],
    itemOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:reduction:collection']]
        ]
    ]
)]
class Reduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:reduction:collection'])]
    private $id;

    #[ORM\Column(type: 'float')]
    #[Groups(['write:reduction', 'read:reduction:collection'])]
    private $value;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['read:reduction:collection'])]
    private $date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reductions')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['write:reduction','read:reduction:collection'])]
    private $user;

    #[ORM\ManyToOne(targetEntity: EnchereInverse::class, inversedBy: 'reductions')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['write:reduction','read:reduction:collection'])]
    private $enchereInverse;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
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

    public function getEnchereInverse(): ?EnchereInverse
    {
        return $this->enchereInverse;
    }

    public function setEnchereInverse(?EnchereInverse $enchereInverse): self
    {
        $this->enchereInverse = $enchereInverse;

        return $this;
    }
}
