<?php

namespace App\Entity;

use App\Repository\OptionCostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionCostRepository::class)
 */
class OptionCost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="optionCosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productOptionCost;

    /**
     * @ORM\ManyToOne(targetEntity=Option::class, inversedBy="optionCosts")
     */
    private $optionCost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getProductOptionCost(): ?Product
    {
        return $this->productOptionCost;
    }

    public function setProductOptionCost(?Product $productOptionCost): self
    {
        $this->productOptionCost = $productOptionCost;

        return $this;
    }

    public function getOptionCost(): ?Option
    {
        return $this->optionCost;
    }

    public function setOptionCost(?Option $optionCost): self
    {
        $this->optionCost = $optionCost;

        return $this;
    }
}
