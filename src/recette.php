<?php
class Recette {
    public $id_recette;
    public $nom_recette;
    public $instructions;
    public $temps_preparation;
    public $id_categorie;
    public $id_ingredient;

    public function __construct($id_recette, $nom_recette, $instructions, $temps_preparation, $id_categorie, $id_ingredient) {
        $this->id_recette = $id_recette;
        $this->nom_recette = $nom_recette;
        $this->instructions = $instructions;
        $this->temps_preparation = $temps_preparation;
        $this->id_categorie = $id_categorie;
        $this->id_ingredient = $id_ingredient;
    }

    // Getter pour l'id_recette
    public function getIdRecette() {
        return $this->id_recette;
    }

    // Getter pour le nom_recette
    public function getNomRecette() {
        return $this->nom_recette;
    }

    // Getter pour les instructions
    public function getInstructions() {
        return $this->instructions;
    }

    // Getter pour le temps_preparation
    public function getTempsPreparation() {
        return $this->temps_preparation;
    }

    // Getter pour l'id_categorie
    public function getIdCategorie() {
        return $this->id_categorie;
    }

    // Getter pour l'id_ingredient
    public function getIdIngredient() {
        return $this->id_ingredient;
    }
}
?>
