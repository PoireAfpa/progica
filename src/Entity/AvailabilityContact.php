<?php

namespace App\Entity;


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
     * @ORM\ManyToOne(targetEntity=Contact::class, inversedBy="availabilities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hourEnd;

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

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

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
}
