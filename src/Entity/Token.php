<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Token
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;

   #[ORM\Column(type: Types::STRING, length: 255)]
    private string $tokenValue;

   #[ORM\Column(type: Types::STRING, length: 255)]
    private string $type;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'tokens')]
    private User $user;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTokenValue(): string
    {
        return $this->tokenValue;
    }

    public function setTokenValue(string $tokenValue): self
    {
        $this->tokenValue = $tokenValue;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }



}
