<?php

namespace App\Entity;

use App\Repository\CalendarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalendarRepository::class)
 */
class Calendar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $dateEnd;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="calendars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productCalendar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeImmutable
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeImmutable $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeImmutable
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeImmutable $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getProductCalendar(): ?Product
    {
        return $this->productCalendar;
    }

    public function setProductCalendar(?Product $productCalendar): self
    {
        $this->productCalendar = $productCalendar;

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
}