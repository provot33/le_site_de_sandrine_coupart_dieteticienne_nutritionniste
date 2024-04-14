<?php

namespace App\Entity;

use App\Repository\RecipeUsesIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeUsesIngredientRepository::class)]
class RecipeUsesIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'recipeUsesIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Recipe $recipe = null;

    #[ORM\ManyToOne(inversedBy: 'recipeUsesIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ingredient $ingredient = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(length: 20)]
    private ?string $unity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): static
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getIngredient(): ?ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): static
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnity(): ?string
    {
        return $this->unity;
    }

    public function setUnity(string $unity): static
    {
        $this->unity = $unity;

        return $this;
    }
}
