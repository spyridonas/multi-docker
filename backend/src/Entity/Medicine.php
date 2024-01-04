<?php

namespace App\Entity;

use App\Repository\MedicineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicineRepository::class)]
class Medicine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $med_id = null;

    #[ORM\Column(length: 255)]
    private ?string $med_name = null;

    #[ORM\Column(length: 255)]
    private ?string $med_company = null;

    #[ORM\Column(length: 255)]
    private ?string $med_company_phone = null;

    #[ORM\Column(length: 255)]
    private ?string $med_company_email = null;

    #[ORM\ManyToOne(inversedBy: 'med_id')]
    private ?Recipe $recipe = null;

    public function getId(): ?int
    {
        return $this->med_id;
    }

    public function getMedName(): ?string
    {
        return $this->med_name;
    }

    public function setMedName(string $med_name): static
    {
        $this->med_name = $med_name;

        return $this;
    }

    public function getMedCompany(): ?string
    {
        return $this->med_company;
    }

    public function setMedCompany(string $med_company): static
    {
        $this->med_company = $med_company;

        return $this;
    }

    public function getMedCompanyPhone(): ?string
    {
        return $this->med_company_phone;
    }

    public function setMedCompanyPhone(string $med_company_phone): static
    {
        $this->med_company_phone = $med_company_phone;

        return $this;
    }

    public function getMedCompanyEmail(): ?string
    {
        return $this->med_company_email;
    }

    public function setMedCompanyEmail(string $med_company_email): static
    {
        $this->med_company_email = $med_company_email;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): static
    {
        $this->recipe = $recipe;

        return $this;
    }
}
