<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $peakSeasonPrice;

    /**
     * @ORM\Column(type="float")
     */
    private $offSeasonPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $room;

    /**
     * @ORM\Column(type="integer")
     */
    private $people;

    /**
     * @ORM\Column(type="boolean")
     */
    private $animal;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $animalCost;

    /**
     * @ORM\ManyToMany(targetEntity=Option::class, mappedBy="productOption")
     */
    private $options;

    /**
     * @ORM\ManyToOne(targetEntity=ProductContact::class, inversedBy="contactProduct")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productContact;

    /**
     * @ORM\OneToMany(targetEntity=Calendar::class, mappedBy="productCalendar", orphanRemoval=true)
     */
    private $calendars;

    /**
     * @ORM\OneToMany(targetEntity=OptionCost::class, mappedBy="productOptionCost", orphanRemoval=true)
     */
    private $optionCosts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productOwner;


    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->calendars = new ArrayCollection();
        $this->optionCosts = new ArrayCollection();
    }

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

    public function getAnimalCost(): ?float
    {
        return $this->animalCost;
    }

    public function setAnimalCost(?float $animalCost): self
    {
        $this->animalCost = $animalCost;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->addProductOption($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->removeElement($option)) {
            $option->removeProductOption($this);
        }

        return $this;
    }

    public function getProductContact(): ?ProductContact
    {
        return $this->productContact;
    }

    public function setProductContact(?ProductContact $productContact): self
    {
        $this->productContact = $productContact;

        return $this;
    }

    /**
     * @return Collection<int, Calendar>
     */
    public function getCalendars(): Collection
    {
        return $this->calendars;
    }

    public function addCalendar(Calendar $calendar): self
    {
        if (!$this->calendars->contains($calendar)) {
            $this->calendars[] = $calendar;
            $calendar->setProductCalendar($this);
        }

        return $this;
    }

    public function removeCalendar(Calendar $calendar): self
    {
        if ($this->calendars->removeElement($calendar)) {
            // set the owning side to null (unless already changed)
            if ($calendar->getProductCalendar() === $this) {
                $calendar->setProductCalendar(null);
            }
        }

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
            $optionCost->setProductOptionCost($this);
        }

        return $this;
    }

    public function removeOptionCost(OptionCost $optionCost): self
    {
        if ($this->optionCosts->removeElement($optionCost)) {
            // set the owning side to null (unless already changed)
            if ($optionCost->getProductOptionCost() === $this) {
                $optionCost->setProductOptionCost(null);
            }
        }

        return $this;
    }



    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

}