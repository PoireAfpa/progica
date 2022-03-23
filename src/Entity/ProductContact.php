<?php

namespace App\Entity;

use App\Repository\ProductContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductContactRepository::class)
 */
class ProductContact
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
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="productContact", orphanRemoval=true)
     */
    private $contactProduct;

    /**
     * @ORM\OneToMany(targetEntity=AvailabilityContact::class, mappedBy="availability", orphanRemoval=true)
     */
    private $availabilityContacts;

    public function __construct()
    {
        $this->contactProduct = new ArrayCollection();
        $this->availabilityContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getContactProduct(): Collection
    {
        return $this->contactProduct;
    }

    public function addContactProduct(Product $contactProduct): self
    {
        if (!$this->contactProduct->contains($contactProduct)) {
            $this->contactProduct[] = $contactProduct;
            $contactProduct->setProductContact($this);
        }

        return $this;
    }

    public function removeContactProduct(Product $contactProduct): self
    {
        if ($this->contactProduct->removeElement($contactProduct)) {
            // set the owning side to null (unless already changed)
            if ($contactProduct->getProductContact() === $this) {
                $contactProduct->setProductContact(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AvailabilityContact>
     */
    public function getAvailabilityContacts(): Collection
    {
        return $this->availabilityContacts;
    }

    public function addAvailabilityContact(AvailabilityContact $availabilityContact): self
    {
        if (!$this->availabilityContacts->contains($availabilityContact)) {
            $this->availabilityContacts[] = $availabilityContact;
            $availabilityContact->setAvailability($this);
        }

        return $this;
    }

    public function removeAvailabilityContact(AvailabilityContact $availabilityContact): self
    {
        if ($this->availabilityContacts->removeElement($availabilityContact)) {
            // set the owning side to null (unless already changed)
            if ($availabilityContact->getAvailability() === $this) {
                $availabilityContact->setAvailability(null);
            }
        }

        return $this;
    }
}
