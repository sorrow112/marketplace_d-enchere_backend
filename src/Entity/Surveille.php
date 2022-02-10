<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SurveilleRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SurveilleRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:surveille:collection']],
    denormalizationContext: ['groups' => ['write:surveille']],
    itemOperations: [
        'delete',
        'get' => [
            'normalisation_context' => ['groups' => ['read:surveille:collection']]
        ]
    ]
)]
class Surveille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:surveille:collection'])]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'surveilles')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['write:surveille'])]
    private $user;

    #[ORM\ManyToOne(targetEntity: Enchere::class, inversedBy: 'surveilles')]
    #[Groups(['write:surveille', 'read:surveille:collection'])]
    private $enchere;

    #[ORM\ManyToOne(targetEntity: EnchereInverse::class, inversedBy: 'surveilles')]
    #[Groups(['write:surveille', 'read:surveille:collection'])]
    private $enchereInverse;

    public function getId(): ?int
    {
        return $this->id;
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
