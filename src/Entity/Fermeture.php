<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FermetureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FermetureRepository::class)]
#[ApiResource]
class Fermeture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'boolean')]
    private $isSold;

    #[ORM\Column(type: 'float')]
    private $finalPrice;

    #[ORM\OneToOne(mappedBy: 'fermeture', targetEntity: Enchere::class, cascade: ['persist', 'remove'])]
    private $enchere;

    #[ORM\OneToOne(mappedBy: 'fermeture', targetEntity: EnchereInverse::class, cascade: ['persist', 'remove'])]
    private $enchereInverse;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsSold(): ?bool
    {
        return $this->isSold;
    }

    public function setIsSold(bool $isSold): self
    {
        $this->isSold = $isSold;

        return $this;
    }

    public function getFinalPrice(): ?float
    {
        return $this->finalPrice;
    }

    public function setFinalPrice(float $finalPrice): self
    {
        $this->finalPrice = $finalPrice;

        return $this;
    }

    public function getEnchere(): ?Enchere
    {
        return $this->enchere;
    }

    public function setEnchere(?Enchere $enchere): self
    {
        // unset the owning side of the relation if necessary
        if ($enchere === null && $this->enchere !== null) {
            $this->enchere->setFermeture(null);
        }

        // set the owning side of the relation if necessary
        if ($enchere !== null && $enchere->getFermeture() !== $this) {
            $enchere->setFermeture($this);
        }

        $this->enchere = $enchere;

        return $this;
    }

    public function getEnchereInverse(): ?EnchereInverse
    {
        return $this->enchereInverse;
    }

    public function setEnchereInverse(?EnchereInverse $enchereInverse): self
    {
        // unset the owning side of the relation if necessary
        if ($enchereInverse === null && $this->enchereInverse !== null) {
            $this->enchereInverse->setFermeture(null);
        }

        // set the owning side of the relation if necessary
        if ($enchereInverse !== null && $enchereInverse->getFermeture() !== $this) {
            $enchereInverse->setFermeture($this);
        }

        $this->enchereInverse = $enchereInverse;

        return $this;
    }
}
