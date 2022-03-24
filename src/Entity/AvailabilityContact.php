<?php

namespace App\Entity;

use App\Repository\AvailabilityContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvailabilityContactRepository::class)
 */
class AvailabilityContact
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
    private $day;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hourStart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hourEnd;

    /**
     * @ORM\ManyToOne(targetEntity=ProductContact::class, inversedBy="availabilityContacts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $availability;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getHourStart(): ?string
    {
        return $this->hourStart;
    }

    public function setHourStart(string $hourStart): self
    {
        $this->hourStart = $hourStart;

        return $this;
    }

    public function getHourEnd(): ?string
    {
        return $this->hourEnd;
    }

    public function setHourEnd(string $hourEnd): self
    {
        $this->hourEnd = $hourEnd;

        return $this;
    }

    public function getAvailability(): ?ProductContact
    {
        return $this->availability;
    }

    public function setAvailability(?ProductContact $availability): self
    {
        $this->availability = $availability;

        return $this;
    }
}
