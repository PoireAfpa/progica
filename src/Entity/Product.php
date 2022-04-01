<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="IDX_D34A04ADE7A1254A", columns={"contact_id"}), @ORM\Index(name="IDX_D34A04ADB58C0B6E", columns={"product_owner_id"})})
 * @ORM\Entity
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var float
     *
     * @ORM\Column(name="peak_season_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $peakSeasonPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="off_season_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $offSeasonPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="surface", type="integer", nullable=false)
     */
    private $surface;

    /**
     * @var int
     *
     * @ORM\Column(name="room", type="integer", nullable=false)
     */
    private $room;

    /**
     * @var int
     *
     * @ORM\Column(name="people", type="integer", nullable=false)
     */
    private $people;

    /**
     * @var bool
     *
     * @ORM\Column(name="animal", type="boolean", nullable=false)
     */
    private $animal;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="smoker", type="boolean", nullable=true)
     */
    private $smoker;

    /**
     * @var float|null
     *
     * @ORM\Column(name="animal_cost", type="float", precision=10, scale=0, nullable=true)
     */
    private $animalCost;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_owner_id", referencedColumnName="id")
     * })
     */
    private $productOwner;

    /**
     * @var \Contact
     *
     * @ORM\ManyToOne(targetEntity="Contact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     * })
     */
    private $contact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPeakSeasonPrice(): ?float
    {
        return $this->peakSeasonPrice;
    }

    public function setPeakSeasonPrice(float $peakSeasonPrice): self
    {
        $this->peakSeasonPrice = $peakSeasonPrice;

        return $this;
    }

    public function getOffSeasonPrice(): ?float
    {
        return $this->offSeasonPrice;
    }

    public function setOffSeasonPrice(float $offSeasonPrice): self
    {
        $this->offSeasonPrice = $offSeasonPrice;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getRoom(): ?int
    {
        return $this->room;
    }

    public function setRoom(int $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getPeople(): ?int
    {
        return $this->people;
    }

    public function setPeople(int $people): self
    {
        $this->people = $people;

        return $this;
    }

    public function getAnimal(): ?bool
    {
        return $this->animal;
    }

    public function setAnimal(bool $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getSmoker(): ?bool
    {
        return $this->smoker;
    }

    public function setSmoker(?bool $smoker): self
    {
        $this->smoker = $smoker;

        return $this;
    }

    public function getAnimalCost(): ?float
    {
        return $this->animalCost;
    }

    public function setAnimalCost(?float $animalCost): self
    {
        $this->animalCost = $animalCost;

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

    public function getProductOwner(): ?User
    {
        return $this->productOwner;
    }

    public function setProductOwner(?User $productOwner): self
    {
        $this->productOwner = $productOwner;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }


}
