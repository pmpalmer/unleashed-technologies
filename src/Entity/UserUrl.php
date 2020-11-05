<?php

namespace App\Entity;

use App\Repository\UserUrlRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=UserUrlRepository::class)
 */
class UserUrl
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Url(
     *    protocols = {"http", "https", "ftp"}
     *)
     */
    private $InputUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ShortenedUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInputUrl(): ?string
    {
        return $this->InputUrl;
    }

    public function setInputUrl(string $InputUrl): self
    {
        $this->InputUrl = $InputUrl;

        return $this;
    }

    public function getShortenedUrl(): ?string
    {
        return $this->ShortenedUrl;
    }

    public function setShortenedUrl(string $ShortenedUrl): self
    {
        $this->ShortenedUrl = $ShortenedUrl;

        return $this;
    }
}
