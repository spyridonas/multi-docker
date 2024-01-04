<?php

namespace App\Entity;

use App\Repository\EmailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmailRepository::class)]
class Email
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $email_id = null;

    #[ORM\Column(length: 255)]
    private ?string $email_literal = null;

    #[ORM\Column(length: 255)]
    private ?string $email_provider = null;

    #[ORM\Column(length: 255)]
    private ?string $email_primary = null;

    #[ORM\Column(length: 255)]
    private ?string $email_notify = null;

    #[ORM\ManyToOne(inversedBy: 'emails')]
    private ?User $user_id = null;

    public function getId(): ?int
    {
        return $this->email_id;
    }

    public function getEmailLiteral(): ?string
    {
        return $this->email_literal;
    }

    public function setEmailLiteral(string $email_literal): static
    {
        $this->email_literal = $email_literal;

        return $this;
    }

    public function getEmailProvider(): ?string
    {
        return $this->email_provider;
    }

    public function setEmailProvider(string $email_provider): static
    {
        $this->email_provider = $email_provider;

        return $this;
    }

    public function getEmailPrimary(): ?string
    {
        return $this->email_primary;
    }

    public function setEmailPrimary(string $email_primary): static
    {
        $this->email_primary = $email_primary;

        return $this;
    }

    public function getEmailNotify(): ?string
    {
        return $this->email_notify;
    }

    public function setEmailNotify(string $email_notify): static
    {
        $this->email_notify = $email_notify;

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
}
