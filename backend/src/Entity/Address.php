<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $address_id = null;

    #[ORM\Column(length: 255)]
    private ?string $address_street = null;

    #[ORM\Column(length: 255)]
    private ?string $address_streetno = null;

    #[ORM\Column(length: 255)]
    private ?string $address_city = null;

    #[ORM\Column(length: 255)]
    private ?string $address_state = null;

    #[ORM\Column(length: 255)]
    private ?string $address_postalcode = null;

    #[ORM\Column(length: 255)]
    private ?string $address_country = null;

    #[ORM\ManyToOne(inversedBy: 'addresses')]
    private ?User $user_id = null;

    public function getId(): ?int
    {
        return $this->address_id;
    }

    public function getAddressStreet(): ?string
    {
        return $this->address_street;
    }

    public function setAddressStreet(string $address_street): static
    {
        $this->address_street = $address_street;

        return $this;
    }

    public function getAddressStreetno(): ?string
    {
        return $this->address_streetno;
    }

    public function setAddressStreetno(string $address_streetno): static
    {
        $this->address_streetno = $address_streetno;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->address_city;
    }

    public function setAddressCity(string $address_city): static
    {
        $this->address_city = $address_city;

        return $this;
    }

    public function getAddressState(): ?string
    {
        return $this->address_state;
    }

    public function setAddressState(string $address_state): static
    {
        $this->address_state = $address_state;

        return $this;
    }

    public function getAddressPostalcode(): ?string
    {
        return $this->address_postalcode;
    }

    public function setAddressPostalcode(string $address_postalcode): static
    {
        $this->address_postalcode = $address_postalcode;

        return $this;
    }

    public function getAddressCountry(): ?string
    {
        return $this->address_country;
    }

    public function setAddressCountry(string $address_country): static
    {
        $this->address_country = $address_country;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
}
