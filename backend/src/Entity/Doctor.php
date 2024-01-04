<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorRepository::class)]
class Doctor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $doc_name = null;

    #[ORM\Column(length: 255)]
    private ?string $doc_surname = null;

    #[ORM\Column(length: 255)]
    private ?string $doc_address = null;

    #[ORM\Column(length: 255)]
    private ?string $doc_phone = null;

    #[ORM\Column(length: 255)]
    private ?string $doc_mobile = null;

    #[ORM\Column(length: 255)]
    private ?string $doc_email = null;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Rendezvous::class)]
    private Collection $rendezvouses;

    public function __construct()
    {
        $this->rendezvouses = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocName(): ?string
    {
        return $this->doc_name;
    }

    public function setDocName(string $doc_name): static
    {
        $this->doc_name = $doc_name;

        return $this;
    }

    public function getDocSurname(): ?string
    {
        return $this->doc_surname;
    }

    public function setDocSurname(string $doc_surname): static
    {
        $this->doc_surname = $doc_surname;

        return $this;
    }

    public function getDocAddress(): ?string
    {
        return $this->doc_address;
    }

    public function setDocAddress(string $doc_address): static
    {
        $this->doc_address = $doc_address;

        return $this;
    }

    public function getDocPhone(): ?string
    {
        return $this->doc_phone;
    }

    public function setDocPhone(string $doc_phone): static
    {
        $this->doc_phone = $doc_phone;

        return $this;
    }

    public function getDocMobile(): ?string
    {
        return $this->doc_mobile;
    }

    public function setDocMobile(string $doc_mobile): static
    {
        $this->doc_mobile = $doc_mobile;

        return $this;
    }

    public function getDocEmail(): ?string
    {
        return $this->doc_email;
    }

    public function setDocEmail(string $doc_email): static
    {
        $this->doc_email = $doc_email;

        return $this;
    }

    /**
     * @return Collection<int, Rendezvous>
     */
    public function getRendezvouses(): Collection
    {
        return $this->rendezvouses;
    }

    public function addRendezvouse(Rendezvous $rendezvouse): static
    {
        if (!$this->rendezvouses->contains($rendezvouse)) {
            $this->rendezvouses->add($rendezvouse);
            $rendezvouse->setDocId($this);
        }

        return $this;
    }

    public function removeRendezvouse(Rendezvous $rendezvouse): static
    {
        if ($this->rendezvouses->removeElement($rendezvouse)) {
            // set the owning side to null (unless already changed)
            if ($rendezvouse->getDocId() === $this) {
                $rendezvouse->setDocId(null);
            }
        }

        return $this;
    }


}
