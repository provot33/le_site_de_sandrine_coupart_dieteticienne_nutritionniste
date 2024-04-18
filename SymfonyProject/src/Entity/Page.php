<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    /**
     * @var Collection<int, PageOrganisation>
     */
    #[ORM\OneToMany(targetEntity: PageOrganisation::class, mappedBy: 'page', orphanRemoval: true)]
    private Collection $pageOrganisations;

    public function __construct()
    {
        $this->pageOrganisations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, PageOrganisation>
     */
    public function getPageOrganisations(): Collection
    {
        return $this->pageOrganisations;
    }

    public function addPageOrganisation(PageOrganisation $pageOrganisation): static
    {
        if (!$this->pageOrganisations->contains($pageOrganisation)) {
            $this->pageOrganisations->add($pageOrganisation);
            $pageOrganisation->setPage($this);
        }

        return $this;
    }

    public function removePageOrganisation(PageOrganisation $pageOrganisation): static
    {
        if ($this->pageOrganisations->removeElement($pageOrganisation)) {
            // set the owning side to null (unless already changed)
            if ($pageOrganisation->getPage() === $this) {
                $pageOrganisation->setPage(null);
            }
        }

        return $this;
    }
}
