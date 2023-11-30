<?php
class Categorie {
    public $id;
    public $nom;
    
    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    // Getter pour l'id
    public function getId() {
        return $this->id;
    }

    // Getter pour le nom
    public function getNom() {
        return $this->nom;
    }
}
?>
