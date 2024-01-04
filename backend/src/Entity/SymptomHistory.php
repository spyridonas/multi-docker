<?php

namespace App\Entity;

use App\Repository\SymptomHistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymptomHistoryRepository::class)]
class SymptomHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $hist_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $hist_date = null;

    #[ORM\Column(length: 255)]
    private ?string $hist_time = null;

    #[ORM\ManyToOne(inversedBy: 'symptomHistories')]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'symptomHistories')]
    private ?Symptom $symptom_id = null;

    public function getId(): ?int
    {
        return $this->hist_id;
    }

    public function getHistDate(): ?\DateTimeInterface
    {
        return $this->hist_date;
    }

    public function setHistDate(\DateTimeInterface $hist_date): static
    {
        $this->hist_date = $hist_date;

        return $this;
    }

    public function getHistTime(): ?string
    {
        return $this->hist_time;
    }

    public function setHistTime(string $hist_time): static
    {
        $this->hist_time = $hist_time;

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

    public function getSymptomId(): ?Symptom
    {
        return $this->symptom_id;
    }

    public function setSymptomId(?Symptom $symptom_id): static
    {
        $this->symptom_id = $symptom_id;

        return $this;
    }
}
