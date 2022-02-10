<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DemandeDevisRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DemandeDevisRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:demandeDevis:collection']],
    denormalizationContext: ['groups' => ['write:demandeDevis']],
    itemOperations: [
        'delete',
        'put',
        'get' => [
            'normalisation_context' => ['groups' => ['read:demandeDevis:collection', 'read:demandeDevis:item']]
        ]
    ]
)]
class DemandeDevis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:demandeDevis:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['write:demandeDevis', 'read:demandeDevis:item'])]
    private $description_article;

    #[ORM\Column(type: 'integer')]
    #[Groups(['write:demandeDevis', 'read:demandeDevis:collection'])]
    private $quantity;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'demandeDevisTransmis')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['write:demandeDevis', 'read:demandeDevis:collection'])]
    private $transmitter;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'demandesRecus')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['write:demandeDevis', 'read:demandeDevis:collection'])]
    private $transmittedTo;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionArticle(): ?string
    {
        return $this->description_article;
    }

    public function setDescriptionArticle(string $description_article): self
    {
        $this->description_article = $description_article;

        return $this;
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

    public function getTransmitter(): ?User
    {
        return $this->transmitter;
    }

    public function setTransmitter(?User $transmitter): self
    {
        $this->transmitter = $transmitter;

        return $this;
    }

    public function getTransmittedTo(): ?User
    {
        return $this->transmittedTo;
    }

    public function setTransmittedTo(?User $transmittedTo): self
    {
        $this->transmittedTo = $transmittedTo;

        return $this;
    }

}
