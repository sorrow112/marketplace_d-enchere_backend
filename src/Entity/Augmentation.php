<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AugmentationRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AugmentationRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:augmentation:collection']],
    denormalizationContext: ['groups' => ['write:augmentation']],
    itemOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:augmentation:collection']]
        ]
    ]
)]
class Augmentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:augmentation:collection'])]
    private $id;

    #[ORM\Column(type: 'float')]
    #[Groups(['write:augmentation', 'read:augmentation:collection', 'read:fermeture:collection'])]
    #[Assert\Positive]
    private $value;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['write:augmentation', 'read:augmentation:collection'])]
    private $date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'augmentations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['write:augmentation','read:augmentation:collection','read:fermeture:collection'])]
    private $user;

    #[ORM\ManyToOne(targetEntity: Enchere::class, inversedBy: 'augmentations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['write:augmentation','read:augmentation:collection'])]
    private $enchere;

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

    public function getEnchere(): ?Enchere
    {
        return $this->enchere;
    }

    public function setEnchere(?Enchere $enchere): self
    {
        $this->enchere = $enchere;

        return $this;
    }
}
