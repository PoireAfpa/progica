<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OptionCost
 *
 * @ORM\Table(name="option_cost", indexes={@ORM\Index(name="IDX_F0283E1FA7C41D6F", columns={"option_id"}), @ORM\Index(name="IDX_F0283E1F4584665A", columns={"product_id"})})
 * @ORM\Entity
 */
class OptionCost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \Option
     *
     * @ORM\ManyToOne(targetEntity="Option")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_id", referencedColumnName="id")
     * })
     */
    private $option;

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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getOption(): ?Option
    {
        return $this->option;
    }

    public function setOption(?Option $option): self
    {
        $this->option = $option;

        return $this;
    }


}
