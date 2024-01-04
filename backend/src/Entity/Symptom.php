<?php

namespace App\Entity;

use App\Repository\SymptomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymptomRepository::class)]
class Symptom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $symptom_name = null;

    #[ORM\Column(length: 255)]
    private ?string $symptom_description = null;

    #[ORM\Column(length: 255)]
    private ?string $symptom_severity = null;

    #[ORM\ManyToMany(targetEntity: Conditions::class, inversedBy: 'symptoms')]
    private Collection $corr_id;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: SymptomHistory::class)]
    private Collection $symptomHistories;

    public function __construct()
    {
        $this->corr_id = new ArrayCollection();
        $this->symptomHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSymptomName(): ?string
    {
        return $this->symptom_name;
    }

    public function setSymptomName(string $symptom_name): static
    {
        $this->symptom_name = $symptom_name;

        return $this;
    }

    public function getSymptomDescription(): ?string
    {
        return $this->symptom_description;
    }

    public function setSymptomDescription(string $symptom_description): static
    {
        $this->symptom_description = $symptom_description;

        return $this;
    }

    public function getSymptomSeverity(): ?string
    {
        return $this->symptom_severity;
    }

    public function setSymptomSeverity(string $symptom_severity): static
    {
        $this->symptom_severity = $symptom_severity;

        return $this;
    }

    /**
     * @return Collection<int, Conditions>
     */
    public function getCorrId(): Collection
    {
        return $this->corr_id;
    }

    public function addCorrId(Conditions $corrId): static
    {
        if (!$this->corr_id->contains($corrId)) {
            $this->corr_id->add($corrId);
        }

        return $this;
    }

    public function removeCorrId(Conditions $corrId): static
    {
        $this->corr_id->removeElement($corrId);

        return $this;
    }

    /**
     * @return Collection<int, SymptomHistory>
     */
    public function getSymptomHistories(): Collection
    {
        return $this->symptomHistories;
    }

    public function addSymptomHistory(SymptomHistory $symptomHistory): static
    {
        if (!$this->symptomHistories->contains($symptomHistory)) {
            $this->symptomHistories->add($symptomHistory);
            $symptomHistory->setSymptomId($this);
        }

        return $this;
    }

    public function removeSymptomHistory(SymptomHistory $symptomHistory): static
    {
        if ($this->symptomHistories->removeElement($symptomHistory)) {
            // set the owning side to null (unless already changed)
            if ($symptomHistory->getSymptomId() === $this) {
                $symptomHistory->setSymptomId(null);
            }
        }

        return $this;
    }
}
