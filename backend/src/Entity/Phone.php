<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $phone_id = null;

    #[ORM\Column(length: 255)]
    private ?string $phone_literal = null;

    #[ORM\Column(length: 255)]
    private ?string $phone_type = null;

    #[ORM\Column(length: 255)]
    private ?string $phone_provider = null;

    #[ORM\Column(length: 255)]
    private ?string $phone_sms_notify = null;

    #[ORM\Column(length: 255)]
    private ?string $phone_push_notify = null;

    #[ORM\ManyToOne(inversedBy: 'phones')]
    private ?User $user_id = null;

    public function getId(): ?int
    {
        return $this->phone_id;
    }

    public function getPhoneLiteral(): ?string
    {
        return $this->phone_literal;
    }

    public function setPhoneLiteral(string $phone_literal): static
    {
        $this->phone_literal = $phone_literal;

        return $this;
    }

    public function getPhoneType(): ?string
    {
        return $this->phone_type;
    }

    public function setPhoneType(string $phone_type): static
    {
        $this->phone_type = $phone_type;

        return $this;
    }

    public function getPhoneProvider(): ?string
    {
        return $this->phone_provider;
    }

    public function setPhoneProvider(string $phone_provider): static
    {
        $this->phone_provider = $phone_provider;

        return $this;
    }

    public function getPhoneSmsNotify(): ?string
    {
        return $this->phone_sms_notify;
    }

    public function setPhoneSmsNotify(string $phone_sms_notify): static
    {
        $this->phone_sms_notify = $phone_sms_notify;

        return $this;
    }

    public function getPhonePushNotify(): ?string
    {
        return $this->phone_push_notify;
    }

    public function setPhonePushNotify(string $phone_push_notify): static
    {
        $this->phone_push_notify = $phone_push_notify;

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
