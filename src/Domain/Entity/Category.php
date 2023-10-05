<?php

namespace App\Domain\Entity;

use App\Kernel\Domain\AuditableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Infra\Repository\CategoryRepository;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: '`categories`')]
#[ORM\HasLifecycleCallbacks]
final class Category extends AuditableEntity
{
    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    // inverse side of the relation
    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'categories', cascade: ['persist'])]
    private Collection $products;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->products = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
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

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->addCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->remove($product);
            $product->removeCategory($this);
        }

        return $this;
    }

    public function getProducts() : Collection
    {
        return $this->products;
    }
}
