<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, RecipeUsesIngredient>
     */
    #[ORM\OneToMany(targetEntity: RecipeUsesIngredient::class, mappedBy: 'idIngredient', orphanRemoval: true)]
    private Collection $recipeUsesIngredients;

    /**
     * @var Collection<int, Allergen>
     */
    #[ORM\ManyToMany(targetEntity: Allergen::class, inversedBy: 'ingredients')]
    private Collection $allergens;

    public function __construct()
    {
        $this->recipeUsesIngredients = new ArrayCollection();
        $this->allergens = new ArrayCollection();
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
            $recipeUsesIngredient->setIngredient($this);
        }

        return $this;
    }

    public function removeRecipeUsesIngredient(RecipeUsesIngredient $recipeUsesIngredient): static
    {
        if ($this->recipeUsesIngredients->removeElement($recipeUsesIngredient)) {
            // set the owning side to null (unless already changed)
            if ($recipeUsesIngredient->getIngredient() === $this) {
                $recipeUsesIngredient->setIngredient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Allergen>
     */
    public function getAllergens(): Collection
    {
        return $this->allergens;
    }

    public function addAllergen(Allergen $allergen): static
    {
        if (!$this->allergens->contains($allergen)) {
            $this->allergens->add($allergen);
        }

        return $this;
    }

    public function removeAllergen(Allergen $allergen): static
    {
        $this->allergens->removeElement($allergen);

        return $this;
    }
}
