<?php

namespace App\Entity;

use App\Repository\PageOrganisationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageOrganisationRepository::class)]
class PageOrganisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pageOrganisations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Page $page = null;

    #[ORM\OneToOne(inversedBy: 'pageOrganisation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?WebContent $webContent = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $placeInPage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): static
    {
        $this->page = $page;

        return $this;
    }

    public function getWebContent(): ?WebContent
    {
        return $this->webContent;
    }

    public function setWebContent(WebContent $webContent): static
    {
        $this->webContent = $webContent;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getPlaceInPage(): ?int
    {
        return $this->placeInPage;
    }

    public function setPlaceInPage(int $placeInPage): static
    {
        $this->placeInPage = $placeInPage;

        return $this;
    }
}
