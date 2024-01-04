<?php

namespace App\Entity;

use App\Repository\ConditionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConditionsRepository::class)]
class Conditions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $condition_name = null;

    #[ORM\Column(length: 255)]
    private ?string $condition_category = null;

    #[ORM\Column(length: 255)]
    private ?string $condition_description = null;

    #[ORM\Column(length: 255)]
    private ?string $condition_severity = null;

    #[ORM\ManyToMany(targetEntity: Symptom::class, mappedBy: 'corr_id')]
    private Collection $symptoms;

    public function __construct()
    {
        $this->symptoms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConditionName(): ?string
    {
        return $this->condition_name;
    }

    public function setConditionName(string $condition_name): static
    {
        $this->condition_name = $condition_name;

        return $this;
    }

    public function getConditionCategory(): ?string
    {
        return $this->condition_category;
    }

    public function setConditionCategory(string $condition_category): static
    {
        $this->condition_category = $condition_category;

        return $this;
    }

    public function getConditionDescription(): ?string
    {
        return $this->condition_description;
    }

    public function setConditionDescription(string $condition_description): static
    {
        $this->condition_description = $condition_description;

        return $this;
    }

    public function getConditionSeverity(): ?string
    {
        return $this->condition_severity;
    }

    public function setConditionSeverity(string $condition_severity): static
    {
        $this->condition_severity = $condition_severity;

        return $this;
    }

    /**
     * @return Collection<int, Symptom>
     */
    public function getSymptoms(): Collection
    {
        return $this->symptoms;
    }

    public function addSymptom(Symptom $symptom): static
    {
        if (!$this->symptoms->contains($symptom)) {
            $this->symptoms->add($symptom);
            $symptom->addCorrId($this);
        }

        return $this;
    }

    public function removeSymptom(Symptom $symptom): static
    {
        if ($this->symptoms->removeElement($symptom)) {
            $symptom->removeCorrId($this);
        }

        return $this;
    }
}
