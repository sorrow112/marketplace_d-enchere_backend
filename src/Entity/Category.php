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
    #[Groups(['read:category:collection','read:enchere:item' , 'read:enchereInverse:item' ,'read:enchereInverse:item' ])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:category:collection', 'write:category', 'read:enchere:item' , 'read:enchereInverse:item' ,'read:enchereInverse:item'])]
    private $name;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Enchere::class)]
    private $encheres;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: EnchereInverse::class)]
    private $enchereInverses;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Vente::class)]
    private $ventes;

    public function __construct()
    {
        $this->encheres = new ArrayCollection();
        $this->enchereInverses = new ArrayCollection();
        $this->ventes = new ArrayCollection();
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
     * @return Collection|Enchere[]
     */
    public function getEncheres(): Collection
    {
        return $this->encheres;
    }

    public function addEnchere(Enchere $enchere): self
    {
        if (!$this->encheres->contains($enchere)) {
            $this->encheres[] = $enchere;
            $enchere->setCategory($this);
        }

        return $this;
    }

    public function removeEnchere(Enchere $enchere): self
    {
        if ($this->encheres->removeElement($enchere)) {
            // set the owning side to null (unless already changed)
            if ($enchere->getCategory() === $this) {
                $enchere->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EnchereInverse[]
     */
    public function getEnchereInverses(): Collection
    {
        return $this->enchereInverses;
    }

    public function addEnchereInverse(EnchereInverse $enchereInverse): self
    {
        if (!$this->enchereInverses->contains($enchereInverse)) {
            $this->enchereInverses[] = $enchereInverse;
            $enchereInverse->setCategory($this);
        }

        return $this;
    }

    public function removeEnchereInverse(EnchereInverse $enchereInverse): self
    {
        if ($this->enchereInverses->removeElement($enchereInverse)) {
            // set the owning side to null (unless already changed)
            if ($enchereInverse->getCategory() === $this) {
                $enchereInverse->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vente[]
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Vente $vente): self
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes[] = $vente;
            $vente->setCategory($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): self
    {
        if ($this->ventes->removeElement($vente)) {
            // set the owning side to null (unless already changed)
            if ($vente->getCategory() === $this) {
                $vente->setCategory(null);
            }
        }

        return $this;
    }

   
}
