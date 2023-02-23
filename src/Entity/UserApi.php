<?php

namespace App\Entity;

use App\Repository\UserApiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserApiRepository::class)]
class UserApi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $api_key = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $site_url_request = null;

    #[ORM\ManyToOne(inversedBy: 'api')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApiKey(): ?string
    {
        return $this->api_key;
    }

    public function setApiKey(string $api_key): self
    {
        $this->api_key = $api_key;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSiteUrlRequest(): ?string
    {
        return $this->site_url_request;
    }

    public function setSiteUrlRequest(string $site_url_request): self
    {
        $this->site_url_request = $site_url_request;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {

        $this->user = $user;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }


}
