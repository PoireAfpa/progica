<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionRepository::class)
 * @ORM\Table(name="`option`")
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="options")
     */
    private $productOption;

    /**
     * @ORM\OneToMany(targetEntity=OptionCost::class, mappedBy="optionCost")
     */
    private $optionCosts;

<<<<<<< HEAD
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

=======
>>>>>>> fb259ce64207e7fd046595f09986b02fefc07b1e
    public function __construct()
    {
        $this->productOption = new ArrayCollection();
        $this->optionCosts = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductOption(): Collection
    {
        return $this->productOption;
    }

    public function addProductOption(Product $productOption): self
    {
        if (!$this->productOption->contains($productOption)) {
            $this->productOption[] = $productOption;
        }

        return $this;
    }

    public function removeProductOption(Product $productOption): self
    {
        $this->productOption->removeElement($productOption);

        return $this;
    }

    /**
     * @return Collection<int, OptionCost>
     */
    public function getOptionCosts(): Collection
    {
        return $this->optionCosts;
    }

    public function addOptionCost(OptionCost $optionCost): self
    {
        if (!$this->optionCosts->contains($optionCost)) {
            $this->optionCosts[] = $optionCost;
            $optionCost->setOptionCost($this);
        }

        return $this;
    }

    public function removeOptionCost(OptionCost $optionCost): self
    {
        if ($this->optionCosts->removeElement($optionCost)) {
            // set the owning side to null (unless already changed)
            if ($optionCost->getOptionCost() === $this) {
                $optionCost->setOptionCost(null);
            }
        }

        return $this;
    }
<<<<<<< HEAD

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
=======
>>>>>>> fb259ce64207e7fd046595f09986b02fefc07b1e
}
