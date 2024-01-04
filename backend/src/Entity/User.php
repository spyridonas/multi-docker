<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $user_fathername = null;

    #[ORM\Column(length: 255)]
    private ?string $user_surname = null;

    #[ORM\Column(length: 255)]
    private ?string $user_phoneno_prim = null;

    #[ORM\Column(length: 255)]
    private ?string $user_email_prim = null;

    #[ORM\Column(length: 255)]
    private ?string $user_mobile_prim = null;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Phone::class)]
    private Collection $phones;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Email::class)]
    private Collection $emails;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Address::class)]
    private Collection $addresses;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Recipe::class)]
    private Collection $recipes;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Rendezvous::class)]
    private Collection $rendezvouses;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Visitation::class)]
    private Collection $visitations;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: SymptomHistory::class)]
    private Collection $symptomHistories;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->recipes = new ArrayCollection();
        $this->rendezvouses = new ArrayCollection();
        $this->visitations = new ArrayCollection();
        $this->symptomHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserFathername(): ?string
    {
        return $this->user_fathername;
    }

    public function setUserFathername(string $user_fathername): static
    {
        $this->user_fathername = $user_fathername;

        return $this;
    }

    public function getUserSurname(): ?string
    {
        return $this->user_surname;
    }

    public function setUserSurname(string $user_surname): static
    {
        $this->user_surname = $user_surname;

        return $this;
    }

    public function getUserPhonenoPrim(): ?string
    {
        return $this->user_phoneno_prim;
    }

    public function setUserPhonenoPrim(string $user_phoneno_prim): static
    {
        $this->user_phoneno_prim = $user_phoneno_prim;

        return $this;
    }

    public function getUserEmailPrim(): ?string
    {
        return $this->user_email_prim;
    }

    public function setUserEmailPrim(string $user_email_prim): static
    {
        $this->user_email_prim = $user_email_prim;

        return $this;
    }

    public function getUserMobilePrim(): ?string
    {
        return $this->user_mobile_prim;
    }

    public function setUserMobilePrim(string $user_mobile_prim): static
    {
        $this->user_mobile_prim = $user_mobile_prim;

        return $this;
    }

    /**
     * @return Collection<int, Phone>
     */
    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addPhone(Phone $phone): static
    {
        if (!$this->phones->contains($phone)) {
            $this->phones->add($phone);
            $phone->setUserId($this);
        }

        return $this;
    }

    public function removePhone(Phone $phone): static
    {
        if ($this->phones->removeElement($phone)) {
            // set the owning side to null (unless already changed)
            if ($phone->getUserId() === $this) {
                $phone->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Email>
     */
    public function getEmails(): Collection
    {
        return $this->emails;
    }

    public function addEmail(Email $email): static
    {
        if (!$this->emails->contains($email)) {
            $this->emails->add($email);
            $email->setUserId($this);
        }

        return $this;
    }

    public function removeEmail(Email $email): static
    {
        if ($this->emails->removeElement($email)) {
            // set the owning side to null (unless already changed)
            if ($email->getUserId() === $this) {
                $email->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): static
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses->add($address);
            $address->setUserId($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): static
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getUserId() === $this) {
                $address->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Recipe>
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): static
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
            $recipe->setUserId($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): static
    {
        if ($this->recipes->removeElement($recipe)) {
            // set the owning side to null (unless already changed)
            if ($recipe->getUserId() === $this) {
                $recipe->setUserId(null);
            }
        }

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
            $rendezvouse->setUserId($this);
        }

        return $this;
    }

    public function removeRendezvouse(Rendezvous $rendezvouse): static
    {
        if ($this->rendezvouses->removeElement($rendezvouse)) {
            // set the owning side to null (unless already changed)
            if ($rendezvouse->getUserId() === $this) {
                $rendezvouse->setUserId(null);
            }
        }

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
            $visitation->setUserId($this);
        }

        return $this;
    }

    public function removeVisitation(Visitation $visitation): static
    {
        if ($this->visitations->removeElement($visitation)) {
            // set the owning side to null (unless already changed)
            if ($visitation->getUserId() === $this) {
                $visitation->setUserId(null);
            }
        }

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
            $symptomHistory->setUserId($this);
        }

        return $this;
    }

    public function removeSymptomHistory(SymptomHistory $symptomHistory): static
    {
        if ($this->symptomHistories->removeElement($symptomHistory)) {
            // set the owning side to null (unless already changed)
            if ($symptomHistory->getUserId() === $this) {
                $symptomHistory->setUserId(null);
            }
        }

        return $this;
    }
}
