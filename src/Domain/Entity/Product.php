<?php

namespace App\Domain\Entity;

use App\Kernel\Domain\AuditableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Infra\Repository\ProductRepository;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: '`products`')]
#[ORM\HasLifecycleCallbacks]
final class Product extends AuditableEntity
{
    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $code;

    #[ORM\Column(type: 'boolean')]
    private bool $isActive;

    // Many Products have Many Categories.
    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'products')]
    #[ORM\JoinTable(name: '`products_categories`')]
    private Collection $categories;

    public function __construct(string $name, string $code, bool $isActive = false)
    {
        $this->name = $name;
        $this->code = $code;
        $this->isActive = $isActive;

        $this->categories = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function activate(): self
    {
        $this->isActive = true;

        return $this;
    }

    public function deactivate(): self
    {
        $this->isActive = false;

        return $this;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addProduct($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->remove($category);
            $category->removeProduct($this);
        }

        return $this;
    }

    public function getCategories() : Collection
    {
        return $this->categories;
    }
}
