<?php

namespace App\Entity;

use App\Repository\VisitationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitationRepository::class)]
class Visitation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $isit_doctor = null;

    #[ORM\Column(length: 255)]
    private ?string $visit_department = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $visit_date = null;

    #[ORM\Column(length: 255)]
    private ?string $visit_price = null;

    #[ORM\ManyToOne(inversedBy: 'visitations')]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'visitations')]
    private ?Hospital $hospital_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsitDoctor(): ?string
    {
        return $this->isit_doctor;
    }

    public function setIsitDoctor(string $isit_doctor): static
    {
        $this->isit_doctor = $isit_doctor;

        return $this;
    }

    public function getVisitDepartment(): ?string
    {
        return $this->visit_department;
    }

    public function setVisitDepartment(string $visit_department): static
    {
        $this->visit_department = $visit_department;

        return $this;
    }

    public function getVisitDate(): ?\DateTimeInterface
    {
        return $this->visit_date;
    }

    public function setVisitDate(\DateTimeInterface $visit_date): static
    {
        $this->visit_date = $visit_date;

        return $this;
    }

    public function getVisitPrice(): ?string
    {
        return $this->visit_price;
    }

    public function setVisitPrice(string $visit_price): static
    {
        $this->visit_price = $visit_price;

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

    public function getHospitalId(): ?Hospital
    {
        return $this->hospital_id;
    }

    public function setHospitalId(?Hospital $hospital_id): static
    {
        $this->hospital_id = $hospital_id;

        return $this;
    }
}
