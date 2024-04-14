<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $preparationTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $restTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $cookingTime = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $steps = null;

    /**
     * @var Collection<int, RecipeUsesIngredient>
     */
    #[ORM\OneToMany(targetEntity: RecipeUsesIngredient::class, mappedBy: 'recipe', orphanRemoval: true)]
    private Collection $recipeUsesIngredients;

    /**
     * @var Collection<int, Diet>
     */
    #[ORM\ManyToMany(targetEntity: Diet::class, inversedBy: 'recipes')]
    private Collection $diets;

    /**
     * @var Collection<int, Commentary>
     */
    #[ORM\OneToMany(targetEntity: Commentary::class, mappedBy: 'recipe', orphanRemoval: true)]
    private Collection $commentaries;

    public function __construct()
    {
        $this->recipeUsesIngredients = new ArrayCollection();
        $this->diets = new ArrayCollection();
        $this->commentaries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPreparationTime(): ?\DateTimeInterface
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(\DateTimeInterface $preparationTime): static
    {
        $this->preparationTime = $preparationTime;

        return $this;
    }

    public function getRestTime(): ?\DateTimeInterface
    {
        return $this->restTime;
    }

    public function setRestTime(\DateTimeInterface $restTime): static
    {
        $this->restTime = $restTime;

        return $this;
    }

    public function getCookingTime(): ?\DateTimeInterface
    {
        return $this->cookingTime;
    }

    public function setCookingTime(\DateTimeInterface $cookingTime): static
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getSteps(): ?string
    {
        return $this->steps;
    }

    public function setSteps(string $steps): static
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * @return Collection<int, RecipeUsesIngredient>
     */
    public function getRecipeUsesIngredients(): Collection
    {
        return $this->recipeUsesIngredients;
    }

    public function addRecipeUsesIngredient(RecipeUsesIngredient $recipeUsesIngredient): static
    {
        if (!$this->recipeUsesIngredients->contains($recipeUsesIngredient)) {
            $this->recipeUsesIngredients->add($recipeUsesIngredient);
            $recipeUsesIngredient->setRecipe($this);
        }

        return $this;
    }

    public function removeRecipeUsesIngredient(RecipeUsesIngredient $recipeUsesIngredient): static
    {
        if ($this->recipeUsesIngredients->removeElement($recipeUsesIngredient)) {
            // set the owning side to null (unless already changed)
            if ($recipeUsesIngredient->getRecipe() === $this) {
                $recipeUsesIngredient->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Diet>
     */
    public function getDiets(): Collection
    {
        return $this->diets;
    }

    public function addDiet(Diet $diet): static
    {
        if (!$this->diets->contains($diet)) {
            $this->diets->add($diet);
        }

        return $this;
    }

    public function removeDiet(Diet $diet): static
    {
        $this->diets->removeElement($diet);

        return $this;
    }

    /**
     * @return Collection<int, Commentary>
     */
    public function getCommentaries(): Collection
    {
        return $this->commentaries;
    }

    public function addCommentary(Commentary $commentary): static
    {
        if (!$this->commentaries->contains($commentary)) {
            $this->commentaries->add($commentary);
            $commentary->setRecipe($this);
        }

        return $this;
    }

    public function removeCommentary(Commentary $commentary): static
    {
        if ($this->commentaries->removeElement($commentary)) {
            // set the owning side to null (unless already changed)
            if ($commentary->getRecipe() === $this) {
                $commentary->setRecipe(null);
            }
        }

        return $this;
    }
}
