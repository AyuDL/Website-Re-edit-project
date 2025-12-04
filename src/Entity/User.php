<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private int  $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $uid;

    #[ORM\Column(type: Types:: STRING, length: 255)]
    private string $firstname;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $lastname;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $email;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $password;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isConfirmed;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isAdmin;

    #[ORM\OneToMany(targetEntity: Token::class, mappedBy: 'users')]
    private Token $tokens;

    #[ORM\OneToMany(targetEntity: Post::class, mappedBy: 'users')]
    private Post $posts;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'users')]
    private Comment $comments;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;
        return $this;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function isConfirmed(): bool
    {
        return $this->isConfirmed;
    }

    public function setIsConfirmed(bool $isConfirmed): self
    {
        $this->isConfirmed = $isConfirmed;
        return $this;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    public function getTokens(): Token
    {
        return $this->tokens;
    }

    public function setTokens(Token $tokens): self
    {
        $this->tokens = $tokens;
        return $this;
    }

    public function getPosts(): Post
    {
        return $this->posts;
    }

    public function setPosts(Post $posts): self
    {
        $this->posts = $posts;
        return $this;
    }

    public function getComments(): Comment
    {
        return $this->comments;
    }

    public function setComments(Comment $comments): self
    {
        $this->comments = $comments;
        return $this;
    }


}
