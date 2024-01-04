<?php

namespace App\Entity;

use App\Repository\HospitalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HospitalRepository::class)]
class Hospital
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $hospital_name = null;

    #[ORM\Column(length: 255)]
    private ?string $hospital_address = null;

    #[ORM\Column(length: 255)]
    private ?string $hospital_company = null;

    #[ORM\Column(length: 255)]
    private ?string $hospital_phone = null;

    #[ORM\Column(length: 255)]
    private ?string $hospital_email = null;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Visitation::class)]
    private Collection $visitations;

    public function __construct()
    {
        $this->visitations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHospitalName(): ?string
    {
        return $this->hospital_name;
    }

    public function setHospitalName(string $hospital_name): static
    {
        $this->hospital_name = $hospital_name;

        return $this;
    }

    public function getHospitalAddress(): ?string
    {
        return $this->hospital_address;
    }

    public function setHospitalAddress(string $hospital_address): static
    {
        $this->hospital_address = $hospital_address;

        return $this;
    }

    public function getHospitalCompany(): ?string
    {
        return $this->hospital_company;
    }

    public function setHospitalCompany(string $hospital_company): static
    {
        $this->hospital_company = $hospital_company;

        return $this;
    }

    public function getHospitalPhone(): ?string
    {
        return $this->hospital_phone;
    }

    public function setHospitalPhone(string $hospital_phone): static
    {
        $this->hospital_phone = $hospital_phone;

        return $this;
    }

    public function getHospitalEmail(): ?string
    {
        return $this->hospital_email;
    }

    public function setHospitalEmail(string $hospital_email): static
    {
        $this->hospital_email = $hospital_email;

        return $this;
    }

    /**
     * @return Collection<int, Visitation>
     */
    public function getVisitations(): Collection
    {
        return $this->visitations;
    }

    public function addVisitation(Visitation $visitation): static
    {
        if (!$this->visitations->contains($visitation)) {
            $this->visitations->add($visitation);
            $visitation->setHospitalId($this);
        }

        return $this;
    }

    public function removeVisitation(Visitation $visitation): static
    {
        if ($this->visitations->removeElement($visitation)) {
            // set the owning side to null (unless already changed)
            if ($visitation->getHospitalId() === $this) {
                $visitation->setHospitalId(null);
            }
        }

        return $this;
    }
}
