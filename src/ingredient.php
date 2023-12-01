<?php

class Ingredient {
    public $id_ingredient;
    public $nom_ingredient;
    public $quantite_disponible;
    public $unite_mesure;

    public function __construct($id_ingredient, $nom_ingredient, $quantite_disponible, $unite_mesure) {
        $this->id_ingredient = $id_ingredient;
        $this->nom_ingredient = $nom_ingredient;
        $this->quantite_disponible = $quantite_disponible;
        $this->unite_mesure = $unite_mesure;
    }
     // Ajout des getters
     public function getIdIngredient() {
        return $this->id_ingredient;
    }

    public function getNomIngredient() {
        return $this->nom_ingredient;
    }

    public function getQuantiteDisponible() {
        return $this->quantite_disponible;
    }

    public function getUniteMesure() {
        return $this->unite_mesure;
    }
}


?>