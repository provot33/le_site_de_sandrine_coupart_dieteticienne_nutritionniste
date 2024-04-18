<?php

namespace App\Entity;

use App\Repository\WebContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebContentRepository::class)]
class WebContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\OneToOne(mappedBy: 'webContent', cascade: ['persist', 'remove'])]
    private ?PageOrganisation $pageOrganisation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getPageOrganisation(): ?PageOrganisation
    {
        return $this->pageOrganisation;
    }

    public function setPageOrganisation(PageOrganisation $pageOrganisation): static
    {
        // set the owning side of the relation if necessary
        if ($pageOrganisation->getWebContent() !== $this) {
            $pageOrganisation->setWebContent($this);
        }

        $this->pageOrganisation = $pageOrganisation;

        return $this;
    }
}
