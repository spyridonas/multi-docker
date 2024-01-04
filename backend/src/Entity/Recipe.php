<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $recipe_doctor = null;

    #[ORM\Column(length: 255)]
    private ?string $recipe_date = null;

    #[ORM\Column(length: 255)]
    private ?string $recipe_duration = null;

    #[ORM\Column(length: 255)]
    private ?string $recipe_medicine_quantity = null;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    private ?User $user_id = null;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Medicine::class)]
    private Collection $med_id;

    public function __construct()
    {
        $this->med_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipeDoctor(): ?string
    {
        return $this->recipe_doctor;
    }

    public function setRecipeDoctor(string $recipe_doctor): static
    {
        $this->recipe_doctor = $recipe_doctor;

        return $this;
    }

    public function getRecipeDate(): ?string
    {
        return $this->recipe_date;
    }

    public function setRecipeDate(string $recipe_date): static
    {
        $this->recipe_date = $recipe_date;

        return $this;
    }

    public function getRecipeDuration(): ?string
    {
        return $this->recipe_duration;
    }

    public function setRecipeDuration(string $recipe_duration): static
    {
        $this->recipe_duration = $recipe_duration;

        return $this;
    }

    public function getRecipeMedicineQuantity(): ?string
    {
        return $this->recipe_medicine_quantity;
    }

    public function setRecipeMedicineQuantity(string $recipe_medicine_quantity): static
    {
        $this->recipe_medicine_quantity = $recipe_medicine_quantity;

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

    /**
     * @return Collection<int, Medicine>
     */
    public function getMedId(): Collection
    {
        return $this->med_id;
    }

    public function addMedId(Medicine $medId): static
    {
        if (!$this->med_id->contains($medId)) {
            $this->med_id->add($medId);
            $medId->setRecipe($this);
        }

        return $this;
    }

    public function removeMedId(Medicine $medId): static
    {
        if ($this->med_id->removeElement($medId)) {
            // set the owning side to null (unless already changed)
            if ($medId->getRecipe() === $this) {
                $medId->setRecipe(null);
            }
        }

        return $this;
    }
}
