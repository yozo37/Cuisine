<?php
class RecetteDAO {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function addRecette($nom_recette, $instructions, $temps_preparation, $id_categorie, $id_ingredient) {
        try {
            $query = "INSERT INTO recettes (nom_recette, instructions, temps_preparation, id_categorie, id_ingredient) 
                      VALUES (:nom_recette, :instructions, :temps_preparation, :id_categorie, :id_ingredient)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom_recette', $nom_recette);
            $stmt->bindParam(':instructions', $instructions);
            $stmt->bindParam(':temps_preparation', $temps_preparation);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->bindParam(':id_ingredient', $id_ingredient);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur d'ajout de recette : " . $e->getMessage();
            return false;
        }
    }

    public function getRecetteByID($id_recette){
        $stmt = $this->pdo->prepare('SELECT * FROM recettes WHERE id_recette = :id_recette');
        $stmt->execute([':id_recette' => $id_recette]);
        $recetteData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$recetteData){
            return null;
        }

        return new Recette(
            $recetteData['id_recette'],
            $recetteData['nom_recette'],
            $recetteData['instructions'],
            $recetteData['temps_preparation'],
            $recetteData['id_categorie'],
            $recetteData['id_ingredient']
        );
    }

    public function listerRecettes($nom_recette) {
        try {
            $query = "SELECT * FROM recettes WHERE nom_recette = :nom_recette";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom_recette', $nom_recette);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de listing des recettes : " . $e->getMessage();
            return false;
        }
    }

    public function updateRecette($id_recette, $nouveau_nom, $nouvelles_instructions, $nouveau_temps, $nouvelle_categorie, $nouvel_ingredient) {
        try {
            $query = "UPDATE recettes 
                      SET nom_recette = :nouveau_nom, instructions = :nouvelles_instructions, 
                          temps_preparation = :nouveau_temps, id_categorie = :nouvelle_categorie, 
                          id_ingredient = :nouvel_ingredient 
                      WHERE id_recette = :id_recette";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_recette', $id_recette);
            $stmt->bindParam(':nouveau_nom', $nouveau_nom);
            $stmt->bindParam(':nouvelles_instructions', $nouvelles_instructions);
            $stmt->bindParam(':nouveau_temps', $nouveau_temps);
            $stmt->bindParam(':nouvelle_categorie', $nouvelle_categorie);
            $stmt->bindParam(':nouvel_ingredient', $nouvel_ingredient);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de mise à jour de recette : " . $e->getMessage();
            return false;
        }
    }

    public function deleteRecette($id_recette) {
        try {
            $query = "DELETE FROM recettes WHERE id_recette = :id_recette";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_recette', $id_recette);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de suppression de recette : " . $e->getMessage();
            return false;
        }
    }
}
?>
