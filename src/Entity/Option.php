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
     * @Assert\Choice({"service","equipement"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=OptionCost::class, mappedBy="option", orphanRemoval=true)
     */
    private $optionCosts;

    public function __construct()
    {
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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
            $optionCost->setOption($this);
        }

        return $this;
    }

    public function removeOptionCost(OptionCost $optionCost): self
    {
        if ($this->optionCosts->removeElement($optionCost)) {
            // set the owning side to null (unless already changed)
            if ($optionCost->getOption() === $this) {
                $optionCost->setOption(null);
            }
        }

        return $this;
    }
}
