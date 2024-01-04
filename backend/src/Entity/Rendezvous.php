<?php

namespace App\Entity;

use App\Repository\RendezvousRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezvousRepository::class)]
class Rendezvous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ren_date = null;

    #[ORM\Column(length: 255)]
    private ?string $ren_price = null;

    #[ORM\ManyToOne(inversedBy: 'rendezvouses')]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'rendezvouses')]
    private ?Doctor $doc_id = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRenDate(): ?string
    {
        return $this->ren_date;
    }

    public function setRenDate(string $ren_date): static
    {
        $this->ren_date = $ren_date;

        return $this;
    }

    public function getRenPrice(): ?string
    {
        return $this->ren_price;
    }

    public function setRenPrice(string $ren_price): static
    {
        $this->ren_price = $ren_price;

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

    public function getDocId(): ?Doctor
    {
        return $this->doc_id;
    }

    public function setDocId(?Doctor $doc_id): static
    {
        $this->doc_id = $doc_id;

        return $this;
    }

}
