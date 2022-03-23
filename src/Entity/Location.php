<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
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
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cities;

    /**
     * @ORM\Column(type="decimal", precision=16, scale=14)
     */
    private $gpsLng;

    /**
     * @ORM\Column(type="decimal", precision=16, scale=14)
     */
    private $gpsLat;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="location", orphanRemoval=true)
     */
    private $productLocation;

    public function __construct()
    {
        $this->productLocation = new ArrayCollection();
    }

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getCities(): ?string
    {
        return $this->cities;
    }

    public function setCities(string $cities): self
    {
        $this->cities = $cities;

        return $this;
    }

    public function getGpsLng(): ?string
    {
        return $this->gpsLng;
    }

    public function setGpsLng(string $gpsLng): self
    {
        $this->gpsLng = $gpsLng;

        return $this;
    }

    public function getGpsLat(): ?string
    {
        return $this->gpsLat;
    }

    public function setGpsLat(string $gpsLat): self
    {
        $this->gpsLat = $gpsLat;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductLocation(): Collection
    {
        return $this->productLocation;
    }

    public function addProductLocation(Product $productLocation): self
    {
        if (!$this->productLocation->contains($productLocation)) {
            $this->productLocation[] = $productLocation;
            $productLocation->setLocation($this);
        }

        return $this;
    }

    public function removeProductLocation(Product $productLocation): self
    {
        if ($this->productLocation->removeElement($productLocation)) {
            // set the owning side to null (unless already changed)
            if ($productLocation->getLocation() === $this) {
                $productLocation->setLocation(null);
            }
        }

        return $this;
    }

 
}
